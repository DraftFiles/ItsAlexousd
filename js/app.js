const subscriber = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=UCFXeW6bHXo-MNAdSuryeVDg&fields=items/statistics/subscriberCount&key=AIzaSyAM2Y2KOYUnYNFEyphfILMh7le4yP4kvPU";
const frame = document.querySelector('#video-frame'); 
const footer = document.querySelector('#footer'); 
const other_videos = document.querySelector('#other-videos'); 
const threeVideos = document.querySelector('#threeVideos'); 
const modal = document.getElementById('fortnite-modal');

fetch(subscriber)
.then(res=> res.json())
.then(data => {
	document.getElementById("subscribers").innerHTML = "ItsAlexousd | Développeur Java & Youtubeur de "+data.items[0].statistics.subscriberCount + " abonnés";
});

document.querySelectorAll(".fortnite").forEach(function(item){
    item.onclick = function() {
        modal.style.display = "block";
    }
});

document.getElementsByClassName("close")[0].onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
fetch('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=UCFXeW6bHXo-MNAdSuryeVDg&maxResults=18&key=AIzaSyBCM5Co5w7FN2ghRkUZO4cQ9JgH0K57dpo')
.then(res=> res.json())
.then(data => {
var output = [];
for (var i = 0; i < data.items.length; i++) {
    output.push(data.items[i].id.videoId);
}
if(frame != null){
	frame.innerHTML = '<iframe src="//www.youtube.com/embed/'+data.items[0].id.videoId+'?rel=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';					
}
if(window.innerWidth > 1200){
	moment.locale("FR_fr");
	fetch('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&key=AIzaSyBCM5Co5w7FN2ghRkUZO4cQ9JgH0K57dpo&id='+output.join(","))
	.then(res=> res.json())
	.then(data => {
		if (footer != null) {
			const m = moment(data.items[0].snippet.publishedAt);
			const publishedAt =  m.fromNow();
			footer.innerHTML = '<div><h3>'+data.items[0].snippet.title+'</h3><div class="social"><a href="https://www.facebook.com/share.php?u=https://www.youtube.com/watch?v='+data.items[0].id+'" class="icon facebook"><i class="icon-facebook"></i></a><a href="https://twitter.com/intent/tweet?text='+data.items[0].snippet.title+'%20via%20@ItsAlexousd%20https://www.youtube.com/watch?v='+data.items[0].id+'" class="icon twitter"><i class="icon-twitter"></i></a><a href="https://plus.google.com/share?url='+data.items[0].id+'" class="icon google-plus"><i class="icon-google-plus"></i></a><a class="icon linkof" id="partage"><i class="icon-link"></i></a></div></div><div class="infos"><span>Ajouté '+publishedAt+'</span><span>'+data.items[0].statistics.viewCount+' vues</span></div>';
            
            document.getElementById('partage').addEventListener('click',function(){
                prompt("Voici le lien de la vidéo !","https://www.youtube.com/watch?v="+data.items[0].id)
            });
		}
		if(threeVideos != null){
    		var videos = "";
			for (let i = 1; i <= 4; i++) {
				const m = moment(data.items[i].snippet.publishedAt);
				const publishedAt =  m.fromNow();
                videos += '<a href="https://www.youtube.com/watch?v='+data.items[i].id+'" target="blank"><li><div class="miniature"><img src="'+data.items[i].snippet.thumbnails.medium.url+'" alt="'+data.items[i].snippet.title+'"></div><div class="content"><h5>'+data.items[i].snippet.title+'</h5><div class="infos"><span>'+data.items[i].statistics.viewCount+' vues</span><span>'+publishedAt+'</span></div></div></li></a>';
                threeVideos.innerHTML = videos;
			}
		}
		if(other_videos != null){
			var videos = "";
			for (let i = 1; i <= 16; i++) {
			    let videoTitle = data.items[i].snippet.title;
                const videoId = data.items[i].id;
                const videoUrl = data.items[i].snippet.thumbnails.medium.url;
                videos += '<a href="https://www.youtube.com/watch?v='+videoId+'" class="item"><div class="cover"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40px" height="40px"><path fill="#D20000" d="M490.2 114.9c-13.9-24.7-29-29.3-59.6-31C399.9 81.9 322.8 81 256.1 81c-66.9 0-144 0.9-174.7 2.9 -30.6 1.8-45.7 6.3-59.8 31C7.4 139.6 0 182.1 0 256.9c0 0.1 0 0.1 0 0.1 0 0.1 0 0.1 0 0.1v0.1c0 74.5 7.4 117.3 21.7 141.7 14 24.7 29.1 29.2 59.7 31.3 30.7 1.8 107.8 2.8 174.7 2.8 66.8 0 143.9-1.1 174.6-2.8 30.7-2.1 45.8-6.6 59.7-31.3 14.4-24.4 21.7-67.2 21.7-141.7 0 0 0-0.1 0-0.2 0 0 0-0.1 0-0.1C512 182.1 504.7 139.6 490.2 114.9zM192 353V161l160 96L192 353z"/><path fill="#FFFFFF" d="M192 353V161l160 96L192 353z"/></svg></div><img src="'+videoUrl+'" alt="'+videoTitle+'"></a>';
                other_videos.innerHTML = videos;
			}
		}
	});
}else{
	document.getElementById("videos-button").href = "https://www.youtube.com/c/ItsAlexousd";
	if(window.location.href.indexOf("videos") > -1){
		window.location.replace("https://www.youtube.com/c/ItsAlexousd");
	}
}
});



document.querySelector('#mobile-nav-button').addEventListener('click',a=>{document.querySelector('#nav').classList.toggle('open');document.querySelector('#page').classList.toggle('overflow');document.querySelector('.cache').classList.toggle('active')}),document.querySelector('.cache').addEventListener('click',a=>{document.querySelector('#nav').classList.remove('open');document.querySelector('#page').classList.remove('overflow');document.querySelector('.cache').classList.remove('active')})