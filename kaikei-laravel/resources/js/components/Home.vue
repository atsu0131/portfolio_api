

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

        <vue-loading v-show="loading" type="spin" color="#333" :size="{ width: '50px', height: '50px' }"></vue-loading>
        <!-- 検索フォーム -->
        <div class="row" v-show="!loading" >
            <div class="small-2 large-2 columns">検索ワード</div>
            <div class="small-4 large-4 columns">
                <input id="search-id" class="" v-model="searchParam" type="text" placeholder="検索ワードを入力してください" />
            </div>
            <div class="small-6 large-4 columns">
                <a class="button" v-on:click="loadUrl">検索</a>
            </div>
        </div>

        <!-- リスト -->
        <div id="main-block" class="row small-up-1 medium-up-2 large-up-3"></div>
    </div>
</template>

<script>
import { VueLoading } from 'vue-loading-template'
import axios from 'axios'

export default {
    components: {
        VueLoading
    },
    data() {
        return {
            loading: false,
            users: null,
            error: null,
            data: null,
            searchParam: null
        };
    },
    methods: {
        async getDinner (query = null) {
            await axios.get('/api/dinner?param=' + query)
                .then(function(response){
                    this.data = response.data.rest;
                    this.loading = false;
                }.bind(this))
                .catch((error) => console.log(error))
        },
        async loadUrl () {
            this.loading = true;
            await this.getDinner(this.searchParam)

            const mainBlock = document.getElementById("main-block");
            // 全ての子要素を削除する
            while (mainBlock.firstChild) mainBlock.removeChild(mainBlock.firstChild);

            // // 検索ワードを取得する
            let searchData = document.getElementById("search-id").value;

            let getData = this.data;

            for (let i = 0; i < getData.length; i++) {
                var node = document.createElement("div");
                node.setAttribute("class", "column");
                var txt =
                    `<div class="callout"><a href="${getData[i].url}">` +
                    `<p>${getData[i].name}</p>` +
                    `<img src="${getData[i].image_url.shop_image1}" alt="">` +
                    `</a></div>`;

                node.innerHTML = txt;
                mainBlock.appendChild(node);
            }
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
