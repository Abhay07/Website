var app = angular.module("quizApp", ["ngRoute"]);
app.run(function($window, $rootScope, $location) {
        $window.fbAsyncInit = function() {
            FB.init({
                appId: '238947773300195',
                status: true,
                cookie: true,
                version: 'v2.10'
            });

            FB.getLoginStatus(function(response) {
                if (response.status == "connected") {
                    $rootScope.userId = response["authResponse"]["userID"];
                    $rootScope.fbReady = true;
                    $rootScope.$broadcast('fbready');
                    $rootScope.$apply();
                    FB.api('/' + $rootScope.userId + '?fields=picture.type(square)', function(response) {
                        $rootScope.userPic = response["picture"]["data"]["url"];
                    })
                } else {
                    $rootScope.fbReady = true;
                    $rootScope.$broadcast('fbready');
                }
            })
        };


        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        $rootScope.userPic = false;
        $rootScope.userData = null;
        $rootScope.userId = null;
        $rootScope.screenType = window.innerWidth > window.innerHeight ? "desktop" : "mobile";

        // initialise google analytics
        $window.ga('create', 'UA-107351100-1', {
            'cookieDomain': 'none'
        });



        // track pageview on state change
        $rootScope.$on('$routeChangeSuccess', function(event) {
            $window.ga('send', 'pageview', $location.path());
        });
    })
    .config(function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/', {
                templateUrl: "partials/home.html",
                controller: 'homeCtrl'
            })
            .when('/quiz/:quizId', {
                templateUrl: "partials/quiz.html",
                controller: 'quizCtrl'
            })
            .otherwise({
                redirectTo: '/'
            });
    })
    .service('quizDataService', function($http,$rootScope,$q) {
        var quizData = [];

        function setData(d) {
            quizData = d;
        }

        function getData() {
            var deferred = $q.defer();
            if (quizData.length == 0) {
                $http.get('back/getQuiz.php').then(function(response) {
                    data = response["data"]["data"];
                    data = data.reverse();
                    setData(data);
                    //$rootScope.totalQuiz = data.length;
                    //$rootScope.quizzes = data.slice(0, 6);
                    //$rootScope.pageLoaded = true;
                    deferred.resolve(data)
                });
            }else{
                deferred.resolve(quizData);
            }
            return deferred.promise;
        }

        return {
            setData: setData,
            getData: getData
        }
    })
    .service('fbDataService', function($q, $rootScope, drawCanvas) {
        function fetchData(id) {
            var deferred = $q.defer();
            FB.api("/me?fields=id,name,gender,picture.width(400).height(400)", function(response) {
                if (!response || response.error) {
                    deferred.reject(response.error)
                } else {
                    $rootScope.userData = response;
                    $rootScope.userId = response.id;
                    $rootScope.$apply();
                    deferred.resolve(response);
                }
            });
            return deferred.promise;
        }


        function login() {
            var deferred = $q.defer();
            FB.login(function(response) {
                if (response.status == "connected") {
                    deferred.resolve(response);
                } else {
                    deferred.reject(response);
                }
            });
            return deferred.promise;
        }

        function fetchSmallPic(id) {
            var deferred = $q.defer();
            FB.api("/" + id + "?fields=picture.type(square)", function(response) {
                if (!response || response.error) {
                    deferred.reject("User not data not recieved")
                } else {
                    $rootScope.userPic = response["picture"]["data"]["url"];
                    $rootScope.$apply();
                    deferred.resolve("small pic fetched");
                }
            });
            return deferred.promise;
        }

        return {
            fetchData: fetchData,
            login: login,
            fetchSmallPic: fetchSmallPic
        }
    })
    .service('goToQuizService', function($location) {
        return function(n) {
            $location.path('/quiz/' + n);
        }
    })
    .service('gaEvents', function($window, $location) {
        return function(eventAction) {
            $window.ga('send', 'event', 'Quiz' + $location.path().split('/').pop(), eventAction);
        }
    })
    .controller('mainCtrl', function($scope, $rootScope, $http, fbDataService, quizDataService) {
        quizDataService.getData().then(function(response){
            $scope.allQuizzes = response;
            $scope.totalQuiz = response.length;
            $scope.pageLoaded = true;
        });
    })
    .controller('homeCtrl', function($scope, $rootScope, $location, $http, quizDataService, goToQuizService) {
        var data = [];
        $scope.resultGenerated = false;
        $scope.current = 0;
        quizDataService.getData().then(function(response){
            $scope.quizzes = $scope.allQuizzes.slice(0,6);
        });
        $scope.pageNext = function() {
            if ($scope.current <= $scope.totalQuiz - 6) {
                $scope.current += 6;
                $scope.quizzes = $scope.allQuizzes.slice($scope.current, $scope.current + 6);
                window.scroll(0, 0);
            }
        };
        $scope.pagePrev = function() {
            if ($scope.current >= 6) {
                $scope.current -= 6;
                $scope.quizzes = $scope.allQuizzes.slice($scope.current, $scope.current + 6);
                window.scroll(0, 0);
            }
        };

        $scope.goToQuiz = goToQuizService;

    })
    .controller('quizCtrl', function($scope, $timeout, $rootScope, $routeParams, $http, $window, $q, quizDataService, fbDataService, drawCanvas, goToQuizService, gaEvents) {
        gaEvents('view');
        if ($rootScope.screenType == "mobile") {
            window.scroll(0, 0);
        }
        var quizId = $routeParams["quizId"];
        var pageHash;
        var error = false;
        $scope.shareUrl = "https://www.facebook.com/sharer/sharer.php?u=quizhop.net"
        $rootScope.resultGenerated = false;
        $rootScope.calculatingResult = false;
        $scope.quizId = quizId;
        $scope.savingStatus = false;
        quizDataService.getData().then(function(response){
            $scope.quizTitle = $scope.allQuizzes.length > 0 ? $scope.allQuizzes[$scope.totalQuiz - quizId]["title"] : "Title";
            $scope.quizzes = $scope.allQuizzes;
        });
        $scope.goToQuiz = goToQuizService;
        $scope.coverLoaded = false;
        var img = new Image;
        img.src = "images/quizzes/" + quizId + "/coverLarge.jpg?v=0.3"
        img.onload = function() {
            $scope.coverLoaded = true;
            $scope.$apply();
        }
        $scope.waiting = false;

        /*if ($scope.quizzes.length == 0) {
            $http.get('back/getQuiz.php').then(function(response) {
                $rootScope.pageLoaded = true;
                $scope.quizzes = response["data"]["data"];
                quizDataService.setData($scope.quizzes);
                $scope.quizTitle = $scope.quizzes[quizId - 1]["title"];
            });
        } else {
            $rootScope.pageLoaded = true;
        }*/

        $scope.getResult = function(e) {
            gaEvents('played');
            $rootScope.$on("fbready", function() {
                continueGetResult();
            });

            // if FB has't been initialised wait for it
            if (!$rootScope.fbReady) {
                return;
            }

            continueGetResult();

            function generateResult(r) {
                $rootScope.calculatingResult = true;
                drawCanvas(r).then(function(response) {
                    generatePage();
                })
            }

            function continueGetResult() {
                $scope.savingStatus = false;
                if (e.target.className == "try-btn") {
                    $rootScope.resultGenerated = false;
                    $rootScope.calculatingResult = true;
                    $scope.savingStatus = false;
                }

                if ($rootScope.userId == null) {
                    fbDataService.login().then(function(response) {
                        fbDataService.fetchData(response["authResponse"]["userID"]).then(function(response) {
                            fbDataService.fetchSmallPic(response["id"]);
                            generateResult(response);
                        }, function(response) {
                            debugger;
                        });
                    }, function(response) {
                        console.log("User didn't login");
                    })
                } else {
                    if ($rootScope.userData == null) {
                        fbDataService.fetchData($rootScope.userId).then(function(response) {
                            generateResult(response);
                        }, function(response) {
                            console.error(response.message)
                        });
                    } else {
                        generateResult($rootScope.userData);
                    }
                }
            }
        }

        function generatePage() {
            var t1 = performance.now();
            $scope.savingStatus = true;
            $http.post("back/generate.php", { "title": $scope.quizTitle, "quizId": quizId, "image": $rootScope.generatedImage })
                .then(function(response) {
                    $scope.waiting = $scope.savingStatus = false;
                    $rootScope.calculatingResult = false;
                    $rootScope.resultGenerated = true;
                    pageHash = response["data"];
                    console.log(response["data"]);
                    var t2 = performance.now();
                    console.log("time taken to generate page is " + (t2 - t1) / 1000 + "s");
                    if (!isNaN(Number(pageHash))) {
                        error = false;
                        $scope.shareUrl = "https://www.facebook.com/sharer/sharer.php?u=abhaysrivastav.net/Website/back/share/" + pageHash + ".html?q=" + $scope.quizId;
                    } else {
                        error = true;
                        console.log("some error occurred in creating page");
                    }
                }, function(error) {
                    console.log("image not generated");
                });
        }

        $scope.shareResult = function() {
            $scope.waiting = true;
            gaEvents('shared');
            var pageUrl = "abhaysrivastav.net/Website/back/share/" + pageHash + ".html";
            shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + pageUrl + "?q=" + $scope.quizId;
            window.open(shareUrl, 'fbShare', 'width=640,height=320');
        }
    });