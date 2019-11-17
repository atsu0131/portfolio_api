<template>
    <div>
        <div class="title">
          <h1>検索サイト</h1>
          <div class="weather">{{this.city}}{{this.temp}}{{this.condition.main}}</div>
        </div>
        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  export default {
    data: {
      city: null,
      temp: null,
      condition: {
        main: null
      }
    },
    mounted: function(){
        // Laravel側からデータを取得
      axios.get('/api/weather')
      .then(function(response){
        this.city = response.data.name
        this.temp = response.data.main.temp
        this.condition = response.data.weather[0]
      }.bind(this))
      .catch(function(error){
        console.log(error)
      })
    }
  }
</script>

<style>
.title{
  height: 100px;
  width: 100%;
}
h1{
  float: left;
  width:50%;
}
.weather{
  float: right;
}

</style>
