window.addEventListener('load',()=>{
    if(navigator.serviceWorker){
        navigator.serviceWorker.register('/serviceWorker.js')
        .then(()=>console.log('service worker installed'))
        .catch(()=>console.log('services install unsuccessful'));
    }
})
