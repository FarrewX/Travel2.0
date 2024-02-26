<script setup>
//import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Contact"></head>
    <!--<AppLayout> <br>-->
      <div class="container">
        <div class="grid-item" v-for="(person, index) in persons" :key="index">
          <div class="card">
            <div>
              <a target="_blank" :href="person.facebookLink">
                <img :src="person.imageSrc" alt="Person" class="card__image">
              </a>
            </div>          
            <p class="card__name" style="font-size: 16px;">{{ person.name }}</p>
            <p style="font-size: 16px;">{{ person.studentId }}</p>
          </div>
        </div>
      </div>
    <!--</AppLayout>-->
  

</template>
  
<script>
export default {
  data() {
    return {
      persons: [
        {
          name: 'Khatatong Thamwarakornkul',
          studentId: '6504101308',
          facebookLink: 'https://www.facebook.com/khatatong.thamwarakornkul',
          imageSrc: '../image/po.jpg',
        },
        {
          name: 'Chakkaphan Chalamnongnuch',
          studentId: '6504101311',
          facebookLink: 'https://www.facebook.com/chakkapun.chalamnongnuch',
          imageSrc: '../image/gak.jpg'
        },
        {
          name: 'Jesada Promsopa',
          studentId: '6504101314',
          facebookLink: 'https://www.facebook.com/profile.php?id=100006602448104&locale=th_TH',
          imageSrc: '../image/few.jpg'
        },
        {
          name: 'Chanapai Weera',
          studentId: '6504101316',
          facebookLink: 'https://www.facebook.com/Zeemilk3018',
          imageSrc: '../image/fourmost.jpg'
        },
        {
          name: 'Tinnapob Jumpatong',
          studentId: '6504101330',
          facebookLink: 'https://www.facebook.com/profile.php?id=100002846238221',
          imageSrc: '../image/tle.jpg'
        },     
        {
          name: 'Phunsak kankaew',
          studentId: '6504101367',
          facebookLink: 'https://www.facebook.com/profile.php?id=100010747273439',
          imageSrc: '../image/kot.jpg'
        },
      ]
    };
  },
};
</script>

<style scoped>


.container {
  display: grid;
  grid-template-columns: 300px 300px 300px;
  grid-gap: 25px;
  justify-content: center;
  align-items: center;
  background-color: #f5f5f5;
  font-family: 'Baloo Paaji 2', cursive;
}

.card {
  background-color: #444649;
  height: 18rem;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
  color: white;
}

.card__name {
  text-align: center;
  justify-content: center;
}

.card__image {
  object-fit: cover;
  height: 210px;
  width: 210px;
  border-radius: 50%;
  border: 5px solid #272133;
  margin-top: 10px;
  box-shadow: 0 10px 50px rgba(235, 25, 110, 1);
  filter: grayscale(100%);
  transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
}

.card__image:hover{
  object-fit: cover;
  filter: none;
  border-radius: 10%;
  height: 220px;
  width: 220px;
  transition: all 0.2s ease-out;
}

.draw-border {
  box-shadow: inset 0 0 0 4px #58cdd1;
  color: #58afd1;
  -webkit-transition: color 0.25s 0.0833333333s;
  transition: color 0.25s 0.0833333333s;
  position: relative;
}

.draw-border::before,
.draw-border::after {
  border: 0 solid transparent;
  box-sizing: border-box;
  content: '';
  pointer-events: none;
  position: absolute;
  width: 0rem;
  height: 0;
  bottom: 0;
  right: 0;
}

.draw-border::before {
  border-bottom-width: 4px;
  border-left-width: 4px;
}

.draw-border::after {
  border-top-width: 4px;
  border-right-width: 4px;
}

.draw-border:hover {
  color: #ffe593;
}

.draw-border:hover::before,
.draw-border:hover::after {
  border-color: #eb196e;
  -webkit-transition: border-color 0s, width 0.25s, height 0.25s;
  transition: border-color 0s, width 0.25s, height 0.25s;
  width: 100%;
  height: 100%;
}

.draw-border:hover::before {
  -webkit-transition-delay: 0s, 0s, 0.25s;
  transition-delay: 0s, 0s, 0.25s;
}

.draw-border:hover::after {
  -webkit-transition-delay: 0s, 0.25s, 0s;
  transition-delay: 0s, 0.25s, 0s;
}

.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 0.75em 2em;
  letter-spacing: 0.05rem;
  margin: 1em;
  width: 13rem;
}

.btn:focus {
  outline: 2px dotted #55d7dc;
}


.social-icons {
  padding: 0;
  list-style: none;
  margin: 1em;
}

.social-icons li {
  display: inline-block;
  margin: 0.15em;
  position: relative;
  font-size: 1em;
}

.social-icons i {
  color: #fff;
  position: absolute;
  top: 0.95em;
  left: 0.96em;
  transition: all 265ms ease-out;
}

.social-icons a {
  display: inline-block;
}

.social-icons a:before {
  transform: scale(1);
  -ms-transform: scale(1);
  -webkit-transform: scale(1);
  content: " ";
  width: 45px;
  height: 45px;
  border-radius: 100%;
  display: block;
  background: linear-gradient(45deg, #ff003c, #c648c8);
  transition: all 265ms ease-out;
}

.social-icons a:hover:before {
  transform: scale(0);
  transition: all 265ms ease-in;
}

.social-icons a:hover i {
  transform: scale(2.2);
  -ms-transform: scale(2.2);
  -webkit-transform: scale(2.2);
  color: #ff003c;
  background: -webkit-linear-gradient(45deg, #ff003c, #c648c8);
  
  -webkit-text-fill-color: transparent;
  transition: all 265ms ease-in;
}

.card2{
  background-color: #222831;
  height: 15rem;
 
  border-radius: 5%;
  display: flex;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
  color: white;
}
.card__name2 {
  margin-top: 5px;
  font-size: 1.5em;
}
.grid-container2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
  font-size: 0.8em;
}
.picfackbook{
  display: flex;
  justify-content: center;
  text-align: center;
  align-items: center;
  align-content: center;
  align-self: center;
  width: 70px;
  
}


</style>