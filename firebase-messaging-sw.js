importScripts('https://www.gstatic.com/firebasejs/5.5.5/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.5/firebase-messaging.js');

var config = {
  apiKey: "AIzaSyAPA5a0FBYt87i0AJMitg0fC3T3C4Vj_qs",
  authDomain: "joud-129d5.firebaseapp.com",
  databaseURL: "https://joud-129d5.firebaseio.com",
  projectId: "joud-129d5",
  storageBucket: "joud-129d5.appspot.com",
  messagingSenderId: "324063917940"
};


firebase.initializeApp(config);


const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
 console.log('[firebase-messaging-sw.js] Received background message ', payload);
 const notificationTitle = 'Background Message from html';
  const notificationOptions = {
   body: 'Background Message body.',
   icon: '/favicon.png',
   sound:'default'
 };


});

  