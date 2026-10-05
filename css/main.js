window.addEventListener('load',()=>{
    // if(navigator.serviceWorker){
    //     navigator.serviceWorker.register('/serviceWorker.js')
    //     .then(()=>console.log('service worker installed'))
    //     .catch(()=>console.log('services install unsuccessful'));
    // }
    fetch('https://api.abhaysrivastav.org/')
    .then(res=>console.log(res))
    .catch(err=>console.log(err))
    .finally(()=>console.log('api call done to chatbot server'))
})
