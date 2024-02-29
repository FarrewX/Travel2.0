<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Contact"></head>
    <AppLayout></AppLayout>
      <div class="container">
        <div class="grid-item" v-for="(person, index) in persons" :key="index">
          <div class="card">
            <div>
              <a target="_blank" :href="person.facebookLink">
                <img :src="person.imageSrc" alt="Person" class="card__image">
              </a>
            </div>          
            <p class="card__name" style="font-size: 16px;">{{ person.name }}</p>
            <p class="card__name" style="font-size: 16px;">{{ person.studentId }}</p>
          </div>
        </div>
      </div>
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
  padding-top: 20px;
  display: grid;
  grid-template-columns: 300px 300px 300px;
  grid-template-rows: 250px 250px 100px;
  grid-gap: 30px;
  justify-content: center;
  align-items: center;
  font-family: 'Baloo Paaji 2', cursive;
  height: 100%;
  position: fixed;
  
}

.card {
  height: 15rem;
  border-radius: 5px;
  display: flex;
  grid-template-columns: auto;
  flex-direction: column;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.7);
  color: white;
}

.card__name {
  text-align: center;
  justify-content: center;
  color: black;
}

.card__image {
  object-fit: cover;
  height: 210px;
  width: 210px;
  border-radius: 50%;
  border: 5px solid #272133;
  margin-top: 10px;
  box-shadow: 0 10px 50px #176B87;
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



/* สำหรับแท็บเล็ต */
@media (max-width: 1400px) {
  .container{
    min-width: 100%;
    min-height: 100%;
    grid-template-rows: 300px 300px;
  }
}
@media (max-width: 1025px) {
  .container{
    left: auto;
    height: 85%;
  }
}

@media (max-width: 950px) {
  .container{
    top: 3rem;
    grid-template-columns: 200px 200px 200px;
    grid-template-rows: 300px 100px 100px;
    justify-content: center;
    height: 70%;
    left: auto;
    overflow-y: auto;
  }
    .card__image{
    width: 100px;
    height: 100px;
  }
  .card{
    width: 180px;
    height: 180px;
    gap: 10px;
  }
  }

@media (max-width: 900px) {
  .container{
    height: 90%;
    width: 100%;
    grid-template-columns: 300px 300px;
    align-items: center;
    left: 25px;
  }
  
}

@media (max-width: 898px) {
  .container{
    top: 3rem;
    grid-template-columns: 200px 200px 200px;
    grid-template-rows: 300px 100px 100px;
    justify-content: center;
    height: 70%;
    left: auto;
    overflow-y: auto;
  }
  .card__image{
    width: 100px;
    height: 100px;
    
  }
  .card{
    width: 180px;
    height: 180px;
    gap: 10px;
  }
}
@media (max-width: 860px) {
  .container{
    min-height: 100%;
    min-width: 100%;
    left: auto;
    justify-content: center;
  }
}

@media (max-width: 770px) {
  .container{
    grid-gap: 20px;
    grid-template-columns: 200px 200px 200px;
    justify-content: center;
    height: 70%;
    left: auto;
  }
  .card{
    max-width: 220px;
    max-height: 220px;
  }
  .card__image{
    max-width: 120px;
    max-height: 120px;
  }

}

/* สำหรับสมาร์ทโฟน (แนวนอน) */
@media (max-width: 600px) {
  .container{
    grid-gap: 20px;
    grid-template-columns: 100px 100px 100px;
    justify-content: center;
    height: 70%;
    left: auto;
  }
}

/*Mobile version - hidden hamburger menu*/

@media screen and (max-width: 768px) {
  .container{
    top: 5rem;
    grid-template-columns: auto;
    grid-template-rows: 190px 190px 190px 190px 190px 190px 100px; 
    height: 100%;
    
  }
  .card__image{
    width: 100px;
    height: 100px;
  }
  .card{
    width: 200px;
    height: 200px;
    gap: 10px;
  }
}


</style>
