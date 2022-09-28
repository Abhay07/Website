const cacheVersion = "v8";
self.addEventListener('install',(event)=>{
    self.skipWaiting();
    event.waitUntil(caches.open(cacheVersion).then((cache)=>{
        cache.addAll([
            '/',
            '/index.html',
            '/style.css',
            '/images/github.png',
            '/images/twitter.png',
            '/images/linkedin.png',
            '/images/medium.png',
            '/images/email.png',
            '/images/phone.png',
            '/images/mypic.png',
            '/images/auto-poetry.jpg',
            '/images/remove-background.jpg',
            '/images/works/book.png',
            '/images/works/ball.png',
            '/images/works/balloon.png',
            '/images/works/circular-loader.png',
            '/images/works/face.png',
            '/images/works/ninja.png',
            '/images/works/cycle.png',
            '/images/works/bat.png',
            '/images/works/zoom.png',
            '/images/works/circular-pattern.png',
            '/images/works/windscreen.png',
            '/images/works/pageroll.png',
            '/images/works/walkanimation.png',
            '/images/works/concentric-circle.png',
            '/images/works/ecommerce.png',
            '/images/works/ecommerce2.png',
            '/images/works/mahuri.png',
            '/images/works/pagetransition.png'

        ])
        .then(()=>console.log('cached'),(err)=>console.log(err));
    }))
})

self.addEventListener('activate',event=>{
    event.waitUntil(
        (async ()=>{
            const keys = await caches.keys();
            return keys.map(async (cache)=>{
                if(cache !== cacheVersion){
                    console.log("service worker: Removing old cache: "+cache);
                    return await caches.delete(cache);
                }
            })
        })()
    )
})

self.addEventListener('fetch',event=>{
    event.respondWith(
        caches.match(event.request).then(res=>{
            return res || fetch(event.request);
        })
    )
})