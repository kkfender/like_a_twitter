//js書けるよ　npm run dev 忘れずにね

const tweetcard = document.getElementsByClassName('tweetcard');

//ON
for(let i = 0; i < tweetcard.length; i++){

  //クリックイベントでアラートを表示する
  tweetcard[i].addEventListener('mouseenter', () => {
      tweetcard[i].style.backgroundColor  = "#e6ecf0";
  }, false);

}
//OUT
for(let i = 0; i < tweetcard.length; i++){

  //クリックイベントでアラートを表示する
  tweetcard[i].addEventListener('mouseleave', () => {
      tweetcard[i].style.backgroundColor = "white";
  }, false);
}
