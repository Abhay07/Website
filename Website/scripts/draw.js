app
    .service('drawCanvas', function($routeParams, $rootScope, $http, $timeout, $q) {

        function loadImages(arr, callback) {
            var t1 = performance.now();
            this.images = [];
            var loadedImageCount = 0;

            // Make sure arr is actually an array and any other error checking
            for (var i = 0; i < arr.length; i++) {
                var img = new Image();
                img.setAttribute('crossOrigin', 'anonymous');
                if (arr[i] != null) {
                    img.src = arr[i];
                    img.onload = imageLoaded;
                } else {
                    imageLoaded();
                }
                this.images[i] = img;
            }

            function imageLoaded(e) {
                loadedImageCount++;
                if (loadedImageCount >= arr.length) {
                    var t2 = performance.now();
                    console.log("time taken to load all results images is " + (t2 - t1) / 1000 + "s");
                    callback();
                }
            }
        }

        function drawCanvas(uData, quizId) {
            var deferred = $q.defer();

            var canvas, ctx, resImg, quizId;
            canvas = document.getElementById("canvas1");
            ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.textBaseline = "top";
            quizId = $routeParams["quizId"];

            function drawBg(img) {
                ctx.drawImage(img, 0, 0);
            }

            function drawUser(img, data) {
                function drawPicture() {
                    var uPicStyle = data["uPicture"];
                    var x = 0,
                        y = 0;

                    //scale the pic if box is a rectangle
                    if (uPicStyle["h"] > uPicStyle["w"]) {
                        img.height = img.width = uPicStyle["h"];
                        x = uPicStyle["h"] - uPicStyle["w"] / 2;
                    }

                    ctx.drawImage(img, uPicStyle["pos"][0], uPicStyle["pos"][1], uPicStyle["w"], uPicStyle["h"]);
                }

                var uPicture = data["uPicture"];
                if (uPicture != undefined) {
                    if (uPicture["shape"] != undefined) {
                        ctx.save();
                        var radius = uPicture["w"] / 2;
                        var centreX = uPicture["pos"][0] + radius;
                        var centreY = uPicture["pos"][1] + radius;
                        ctx.arc(centreX, centreY, radius, 0, 2 * Math.PI);
                        ctx.clip();
                        drawPicture(img, data);
                        ctx.restore();
                    } else {
                        drawPicture(img, data);
                    }
                }

            }


            $http.get("back/getDetails.php?n=" + quizId).then(function(response) {
                var title = response["data"]["title"];
                var quizId = response["data"]["quizId"];
                var data = response["data"]["results"];
                var uGender = uData["gender"];

                //set a random result number
                var resId = data["genderBased"] != undefined ? Math.floor(Math.random() * ((uGender == "male" ? data["count"]["male"] : data["count"]["female"]) - 1) + 1) : Math.floor(Math.random() * (data["count"] - 1) + 1);


                var resImgUrl = data["resPic"] != undefined ? "images/quizzes/" + quizId + "/results/" + (data["genderBased"] != undefined ? (uGender == "male" ? "male/" + resId : "female/" + resId) : resId) + "." + data["resPic"]["type"] + "?v=0.3": null;
                var backgroundImgUrl = "images/quizzes/" + quizId + "/background." + data["bgType"]+"?v=0.3";
                var userPicUrl = data["uPicture"] != undefined ? uData["picture"]["data"]["url"] : null;


                //load all the required images
                loadImages([resImgUrl, backgroundImgUrl, userPicUrl], function() {

                    if (data["stackOrder"] != undefined) {
                        drawUser(this.images[2], data);
                        drawBg(this.images[1]);
                    } else {
                        drawBg(this.images[1]);
                        drawUser(this.images[2], data);
                    }
                    //draw background
                    deferred.resolve("Result Created");



                    //draw user pic
                    // var uPicture = data["uPicture"];
                    // if (uPicture != undefined) {
                    //     if (uPicture["shape"] != undefined) {
                    //         ctx.save();
                    //         var radius = uPicture["w"] / 2;
                    //         var centreX = uPicture["pos"][0] + radius;
                    //         var centreY = uPicture["pos"][1] + radius;
                    //         ctx.arc(centreX, centreY, radius, 0, 2 * Math.PI);
                    //         ctx.clip();
                    //         drawUser(this.images[2], data);
                    //         ctx.restore();
                    //     } else {
                    //         drawUser(this.images[2], data);
                    //     }
                    // }


                    function drawUserName(num){
                        var num = num || "";
                        ctx.font = (uNameStyle["font-style"+num] != undefined ? uNameStyle["font-style"+num] : "normal") + " " + uNameStyle["font-size"+num] + "px " + uNameStyle["font"+num];
                        ctx.textAlign = uNameStyle["align"+num] || "left";

                        if (uNameStyle["stroke"+num] != undefined) {
                            var stroke = uNameStyle["stroke"+num].split(" ");
                            ctx.strokeStyle = stroke[1];
                            ctx.lineWidth = Number(stroke[0]) * 2.5;
                            ctx.strokeText(uName, uNameStyle["pos"+num][0], uNameStyle["pos"+num][1]);
                        }

                        if (uName["shadow"+num] != undefined) {
                            var shadow = data["nameShadow"].split(" ");
                            ctx.shadowBlur = parseInt(shadow[0]);
                            ctx.shadowColor = shadow[1];
                            ctx.shadowOffsetX = shadow[2] != undefined ? parseInt(shadow[2]) : 0;
                            ctx.shadowOffsetY = shadow[3] != undefined ? parseInt(shadow[3]) : 0;
                        }
                        ctx.fillStyle = uNameStyle["color"+num];

                        ctx.fillText(uName, uNameStyle["pos"+num][0], uNameStyle["pos"+num][1]);
                    }

                    //draw user name
                    if (data["uName"] != undefined) {
                        var uName = uData["name"];
                        var uNameStyle = data["uName"];
                        if (uNameStyle["type"] == "first") {
                            uName = uName.split(' ')[0];
                        }
                        uName = uName + (uNameStyle["charAfter"] || "");
                        drawUserName();
                        if(uNameStyle["pos2"]!=undefined){
                            drawUserName(2);
                        }
                    }


                    //draw res image
                    if (data["resPic"] != undefined) {
                        var resPicStyle = data["resPic"];
                        ctx.drawImage(this.images[0], resPicStyle["pos"][0], resPicStyle["pos"][1]);
                    }

                    function drawResTexts(num) {
                        var num = num || "";
                        var font = (resTxtStyle["font-style"+num] != undefined ? resTxtStyle["font-style"+num] : "normal") + " " + resTxtStyle["font-size"+num] + "px " + resTxtStyle["font"+num];
                        ctx.font = font;
                        ctx.textAlign = resTxtStyle["align"+num] || "left";
                        var txtArr = resTxt.split("\n");

                        for (var i = 0; i < txtArr.length; i++) {
                            if (resTxtStyle["stroke"+num] != undefined) {
                                var stroke = resTxtStyle["stroke"+num].split(" ");
                                ctx.strokeStyle = stroke[1];
                                ctx.lineWidth = Number(stroke[0]) * 2;
                                ctx.strokeText(txtArr[i], resTxtStyle["pos"+num][0], resTxtStyle["pos"+num][1]);
                            }
                            ctx.fillStyle = resTxtStyle["color"+num];
                            ctx.fillText(txtArr[i], resTxtStyle["pos"+num][0], resTxtStyle["pos"+num][1] + i * (resTxtStyle["line-height"+num] || 0));
                        }
                    }

                    //draw result text
                    if (data["resTxts"] != undefined) {
                        var resTxtStyle = data["resTxts"];
                        var resTxt = data["genderBased"] != undefined ? (uGender == "male" ? resTxtStyle["txts"]["male"][resId - 1] : resTxtStyle["txts"]["female"][resId - 1]) : resTxtStyle["txts"][resId - 1];
                        drawResTexts();
                        if(resTxtStyle["pos2"]!=undefined){
                            drawResTexts(2);
                        }
                    }

                    //draw date 
                    if(data["date"]!=undefined){
                        var dateTxtStyle = data["date"];
                        var dateTxt = new Date();
                        var increment = dateTxtStyle["increment"];
                        dateTxt.setDate(dateTxt.getDate() + ((dateTxtStyle["min"] || 0) + (increment=="random" ? Math.floor(Math.random()*200+1) : increment)));
                        dateTxt = dateTxt.toLocaleDateString("en-us",dateTxtStyle["options"]);
                        ctx.font = (dateTxtStyle["font-style"] != undefined ? dateTxtStyle["font-style"] : "normal") + " " + dateTxtStyle["font-size"] + "px " + dateTxtStyle["font"];
                        ctx.textAlign = dateTxtStyle["align"] || "left";
                        ctx.fillStyle = dateTxtStyle["color"];
                        ctx.fillText(dateTxt, dateTxtStyle["pos"][0], dateTxtStyle["pos"][1] + (dateTxtStyle["line-height"] || 0));

                    }

                    $rootScope.generatedImage = canvas.toDataURL("image/jpeg", 0.3);
                });
            });
            return deferred.promise;
        }

        return drawCanvas;
    })