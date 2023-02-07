<script>
    var playPauseBTN = document.getElementsByClassName('play-pause-btn');
    var rewindBTN = document.getElementsByClassName('rewind-btn');
    var fastforwardBTN = document.getElementsByClassName('fastforward-btn');
    var stopBTN = document.getElementsByClassName('stop-btn');
    var count = 0;

    for (var i = 0; i < playPauseBTN.length; i++) {
        playPauseBTN[i].addEventListener("click", function(){
        var songId = this.parentNode.getAttribute("data-song-id");
        var audio = this.parentNode.querySelector("audio");
        if(count == 0){
            count = 1;
            audio.play();
            this.innerHTML = "<i class='fa fa-pause'></i>";
        }else{
            count = 0;
            audio.pause();
            this.innerHTML = "<i class='fa fa-play'></i>";
        }
        });
    }
    for (var i = 0; i < rewindBTN.length; i++) {
        rewindBTN[i].addEventListener("click", function(){
        var songId = this.parentNode.getAttribute("data-song-id");
        var audio = this.parentNode.querySelector("audio");
        audio.currentTime-=15;
        });
    }

    for (var i = 0; i < fastforwardBTN.length; i++) {
        fastforwardBTN[i].addEventListener("click", function(){
        var songId = this.parentNode.getAttribute("data-song-id");
        var audio = this.parentNode.querySelector("audio");
        audio.currentTime+=15;
        });
    }

    for (var i = 0; i < stopBTN.length; i++) {
        stopBTN[i].addEventListener("click", function(){
        var songId = this.parentNode.getAttribute("data-song-id");
        var audio = this.parentNode.querySelector("audio");
        audio.pause();
        audio.currentTime = 0;
        this.parentNode.querySelector(".play-pause-btn").innerHTML = "<i class='fa fa-play'></i>";
        });
    }
</script>