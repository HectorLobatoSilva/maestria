var firebaseConfig = {
    apiKey: "",
    authDomain: "",
    databaseURL: "",
    projectId: "",
    storageBucket: "",
    messagingSenderId: "",
    appId: ""
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

var messageField = document.getElementById('message_input')
var messageResults = document.getElementById('real_time_data')

var user_id = 0

const login = () => {
    document.getElementById('real_time_data').innerHTML = ''
    var user = document.getElementById('login_user').value
    var password = document.getElementById('login_password').value

    firebase.auth().signInWithEmailAndPassword(user, password).catch( error => {
        firebase.auth().createUserWithEmailAndPassword(user, password).catch(error => {
            console.log( 'no se puede guardar' )
        });
    });

    document.getElementById('login_password').value = ''    
}

firebase.auth().onAuthStateChanged( user => {
    if (user) {
      // User is signed in.
        console.log( user.uid )
        user_id = user.uid;
        document.getElementById('login_user').value = user.email
        firebase.database().ref( user_id ).on("child_added", snapshot => {
            console.log( snapshot )
            var message = snapshot.val().text
            if( message != undefined ) {
                var li = document.createElement("LI")
                li.className = "list-group-item list-group-item-action"
                li.id = snapshot.key
                var text = document.createTextNode( message )
                li.appendChild( text )
                messageResults.appendChild( li )
            }
        });

        firebase.database().ref( user_id ).on("child_changed", snapshot => {
            document.getElementById( snapshot.key ).innerHTML = snapshot.val().text
        });

        firebase.database().ref( user_id ).on("child_removed", snapshot => {
            document.getElementById( snapshot.key ).remove()
        });
      // ...
    } else {
      // User is signed out.
      // ...
    }
});

const save_data = () => {
    var message = messageField.value
    firebase.database().ref( user_id ).push({
        fieldName: 'messageField',
        text: message
    })
    messageField.value = ''
}

