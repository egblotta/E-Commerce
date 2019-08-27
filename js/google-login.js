function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    getData(profile);
    window.location.href='main-page.php';
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('Has cerrado la sesión.');
    });
}

function getData(profile) {
    $.ajax({
        url: 'external-user.php',
        type:'POST',
        data: profile,
        success: (profile) => {
            console.log("[SERVER RESPONSE] ", profile);
        }
    })
}