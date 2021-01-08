
// Your web app's Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyAF9h-ZEPEtwqlvJ4Kk0BMzbld9STztgHg",
    authDomain: "project1-d7245.firebaseapp.com",
    projectId: "project1-d7245",
    storageBucket: "project1-d7245.appspot.com",
    messagingSenderId: "422202042674",
    appId: "1:422202042674:web:0cec9a5688a4672c348f2b"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);


var db = firebase.firestore()

function upPost(pid, uid) {
    // them uid vao danh sach nguoi like
    db.collection('posts').doc(pid.toString()).update({up: firebase.firestore.FieldValue.arrayUnion(uid)})
    db.collection('posts').doc(pid.toString()).update({down: firebase.firestore.FieldValue.arrayRemove(uid)})
}

function downPost(pid, uid) {
    //them uid vao danh sach nguoi dislike
    db.collection('posts').doc(pid.toString()).update({down: firebase.firestore.FieldValue.arrayUnion(uid)})
    db.collection('posts').doc(pid.toString()).update({up: firebase.firestore.FieldValue.arrayRemove(uid)})
}

function upComment(cid, uid) {
    // them uid vao danh sach nguoi like
    db.collection('posts').doc(cid.toString()).update({up: firebase.firestore.FieldValue.arrayUnion(uid)})
    db.collection('posts').doc(cid.toString()).update({down: firebase.firestore.FieldValue.arrayRemove(uid)})
}
function downComment(cid, uid) {
    //them uid vao danh sach nguoi dislike
    db.collection('posts').doc(cid.toString()).update({down: firebase.firestore.FieldValue.arrayUnion(uid)})
    db.collection('posts').doc(cid.toString()).update({up: firebase.firestore.FieldValue.arrayRemove(uid)})
}



