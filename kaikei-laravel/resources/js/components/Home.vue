

<template>
  <!-- 検索フォーム -->
<div class="con">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>お店検索</title>
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>



  <!-- ヘッダー -->
  <div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
    <button class="menu-icon" type="button" data-toggle></button>
    <div class="title-bar-title">Menu</div>
  </div>
  <div class="top-bar" id="realEstateMenu">
    <div class="top-bar-right">
      <ul class="menu">
        <li><a href="#">My Account</a></li>
        <li><a class="button">Login</a></li>
      </ul>
    </div>
  </div>
  <br>

  <!-- 検索フォーム -->
  <div class="row">
    <div class="small-2 large-2 columns">検索ワード</div>
    <div class="small-4 large-4 columns">
      <input id="search-id" class="" type="text" placeholder="検索ワードを入力してください" />
    </div>
    <div class="small-6 large-4 columns">
      <a class="button" v-on:click="loadUrl">検索</a></div>
  </div>

  <!-- リスト -->
  <div id="main-block" class="row small-up-1 medium-up-2 large-up-3">
  </div>

</div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            loading: false,
            users: null,
            error: null,
        };
    },
    created() {
        // this.fetchData();
    },
    methods: {
      loadUrl: function () {
      const API_KEY = "a1a61566eb6f815635ac192f64173739"; // apikeyを入力 注意：gitにapikeyを上げない
      const mainBlock = document.getElementById("main-block");
      // 全ての子要素を削除する
      while (mainBlock.firstChild) mainBlock.removeChild(mainBlock.firstChild);

      // 検索ワードを取得する
      let searchData = document.getElementById("search-id").value;

      // URLの生成 本来はサーバー側で処理すべき(apikeyがユーザーに見えてしまうので)
      let _url = `https://api.gnavi.co.jp/RestSearchAPI/v3/?keyid=${API_KEY}&freeword=${searchData}`;
      // Ajax(XMLHttpRequest)処理
      // APIを実行して結果のJSONデータを加工している
      let xhttp = new XMLHttpRequest();
      // 通信が終わった時の処理　通信の状態が変わった時
      // 検索結果出るまで他のことができる
      // コールバック
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let res = JSON.parse(xhttp.responseText);
          for (let i = 0; i < res.rest.length; i++) {
            // this.addCardItem(res.rest[i]);
            var node = document.createElement("div");
            node.setAttribute("class", "column");
            var txt =
              `<div class="callout"><a href="">` +
              `<p>${res.rest[i].name}</p>` +
              `<img src="${res.rest[i].image_url.shop_image1}" alt="">` +
              `</a></div>`;

            node.innerHTML = txt;
            mainBlock.appendChild(node);
          }
        }
      };
      // データ取得開始
      xhttp.open("GET", _url, true);
      xhttp.send();
      },
      addCardItem: function(item) {
        var node = document.createElement("div");
        node.setAttribute("class", "column");
        var txt =
          `<div class="callout"><a href="">` +
          `<p>${item.name}</p>` +
          `<img src="${item.image_url.shop_image1}" alt="">` +
          `</a></div>`;

        node.innerHTML = txt;
        mainBlock.appendChild(node);
      }
    }
}
</script>