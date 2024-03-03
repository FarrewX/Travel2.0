<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import Index from './API/Index.vue';
</script>

<template>
  <AppLayout />
  <div class="head-page">
    <img style="border-radius: 50%;" :src="$page.props.auth.user.profile_photo_url">
    <div>{{ $page.props.auth.user.name }}</div>
  </div>

  <div class="body-page">
    <div class="card-container">
      <div class="d-card" v-for="(detail, index) in details" :key="detail.favplace.id">
        <div class="face face1">
          <div class="content">
            <img src="" alt="">
            <h3>{{ detail.favplace.place_name }}</h3>
          </div>
        </div>
        <div class="face face2">
          <div class="content">
            <p style="color: black; z-index: 1;">Hotel : {{ detail.hotel.favplace[index].name }}</p>
            <p style="color: black; z-index: 1;">restaurant : {{detail.restaurant.favplace[index].name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      details: [],
      user: {},
    };
  },
  async mounted() {
    await this.fetchDetails();
  },
  methods: {
    async fetchDetails() {
  try {
    const favplaceResponse = await axios.get('http://127.0.0.1:8000/api/favplace');

    const favplace_hotel = await Promise.all(favplaceResponse.data.favplace.map(async (item) => {
      const hotel = (await axios.get(`http://127.0.0.1:8000/api/hotel?fav_place_id=${item.id}`)).data;
      return {
        favplace: item,
        hotel: hotel,
      };
    }));

    const all_data = await Promise.all(favplace_hotel.map(async (item) => {
      const restaurant = (await axios.get(`http://127.0.0.1:8000/api/restaurant?fav_place_id=${item.favplace.id}`)).data;
      return {
        favplace: item.favplace,
        hotel: item.hotel,
        restaurant: restaurant
      };
    }));

    this.details = all_data;
    console.log(all_data);
    this.user = favplaceResponse.data.user.length > 0 ? favplaceResponse.data.user[0] : {};
  } catch (error) {

  }
}
  }
};
</script>

<style>
.head-page{
  display: grid;
  justify-content: center;
  text-align: center;
  padding-top: 15px;
  color: rgb(0, 0, 0);
  font-weight: bold;
}

.body-page{
    margin: 0;
    padding: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card-container{
  width: 90%;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  height: 100%;
}

.card-container .d-card{
    cursor: pointer;
}

.card-container .d-card .face{
    width: 300px;
    height: 200px;
    transition: 0.5s;
}

.card-container .d-card .face.face1{
    position: relative;
    background: #5cc7e2;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(100px);
}

.card-container .d-card:hover .face.face1{
    background: #065e8e;
    transform: translateY(0);
}

.card-container .d-card .face.face1 .content{
    opacity: 0.2;
    transition: 0.5s;
}

.card-container .d-card:hover .face.face1 .content{
    opacity: 1;
}

.card-container .d-card .face.face1 .content img{
    max-width: 100px;
}

.card-container .d-card .face.face1 .content h3{
    margin: 10px 0 0;
    padding: 0;
    color: #ffffff;
    text-align: center;
    font-size: 1.5em;
}

.card-container .d-card .face.face2{
    position: relative;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
    transform: translateY(-100px);
}

.card-container .d-card:hover .face.face2{
    transform: translateY(0);
}

.card-container .d-card .face.face2 .content p{
    margin: 0;
    padding: 0;
}

.card-container .d-card .face.face2 .content a{
    margin: 15px 0 0;
    display:  inline-block;
    text-decoration: none;
    font-weight: 900;
    color: #333;
    padding: 5px;
    border: 1px solid #333;
}

.card-container .d-card .face.face2 .content a:hover{
    background: #333;
    color: #fff;
}

@media screen and (min-width: 768px) { /* ปรับขนาดหน้าจอตามต้องการ */
  .card-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* ปรับขนาดคอลัมน์ตามหน้าจอ */
    gap: 20px;
  }
}
</style>