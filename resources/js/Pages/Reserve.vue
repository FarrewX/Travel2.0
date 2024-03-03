<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout />
  <div class="head-page">
    <img style="border-radius: 50%;" :src="$page.props.auth.user.profile_photo_url">
    <div>{{ $page.props.auth.user.name }}</div>
  </div>

  <div class="body-page">
    <div class="card-container" v-if="$page.props.auth.user">
      <div class="d-card" v-for="favplace in details.favplace" :key="favplace.id">
        <div class="face face1" >
          <div class="content">
            <h3>{{ favplace.id }}</h3>
          </div>
        </div>
        <div class="face face2">
          <div class="content">
            <p style="color: black; z-index: 1;">{{ favplace.place_name }}</p>
            <!-- แสดงรายละเอียดเพิ่มเติมของสถานที่ตามที่คุณต้องการ -->
          </div>
        </div>
      </div>  
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      details: []
    };
  },
  mounted() {
    this.fetchDetails();
  },
  methods: {
    async fetchDetails() {
      try {
        const response = await axios.get('/api/favplace');
        this.details = response.data;
        console.log(this.details)
      } catch (error) {
        console.error('Error fetching details:', error);
        alert('Error fetching details. Please try again later.');
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
}

.body-page{
    margin: 0;
    padding: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: consolas;
}

.card-container{
  width: 90%;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
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
    background: #36b5d4;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    transform: translateY(100px);
}

.card-container .d-card:hover .face.face1{
    background: #0d4b6d;
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
    color: #fff;
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