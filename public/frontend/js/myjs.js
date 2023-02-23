/*function hideComment(id) {
    var commentSection = document.getElementById("comment-section" + id);
    if (commentSection.style.display === "none") {
        commentSection.style.display = "block";
    } else {
        commentSection.style.display = "none";
    }
}*/

function hideComment(id) {
    $("#comment-section" + id).toggle();
}

//function do requesting
function request(url, idpost) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url + idpost + "/");
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.log("Request failed.  Returned status of " + xhr.status);
        }
    };
    xhr.send();
}

//function like
function heart(idpost) {
    const likeBtn = document.getElementsByClassName("heart-" + idpost)[0];
    let isLiked = likeBtn.classList.contains("isLiked");

    // if the like button hasn't been clicked
    if (!isLiked) {
        likeBtn.classList.add("isLiked");
        request("/blog/liked/", idpost);
    }
    // if the like button has been clicked
    else {
        likeBtn.classList.remove("isLiked");
        request("/blog/Disliked/", idpost);
    }
    location.reload();
}
