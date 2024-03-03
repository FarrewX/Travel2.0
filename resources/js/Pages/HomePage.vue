<!--ย้ายไปtest.vue ลองทำในนั้นก่อน-->
<script>
    import { Swiper, SwiperSlide } from 'swiper/vue'
    
    import AppLayout from '@/Layouts/AppLayout.vue';
    //Import Swiper styles
    import 'swiper/css'

    import 'swiper/css/effect-coverflow'
    import 'swiper/css/pagination'

    // import required modules
    import { EffectCoverflow, Pagination, Autoplay } from 'swiper/modules'

    import NavLink from '@/Components/NavLink.vue';


    export default {
    components: {
        Swiper,
        SwiperSlide,
        AppLayout
    },
    setup() {
        return {
        modules: [Autoplay, EffectCoverflow, Pagination]
        }
    }
    }
</script>

<template>

    <div class="bg">
     <AppLayout />
      <img class="bg-img" src="https://wallpapercrafter.com/desktop1/630619-nature-pier-lake-mountain-calm-stars-night-2K.jpg" alt="">
      <div class="content absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="Ttext">
          <h1>Travel Planer</h1>
          <h2>Make your own Travel!</h2><br><br><br><br><br>
          <NavLink
              type="button" :href="route('page')" :active="route().current('page')"
              class="inline-block rounded border-2 border-white px-8 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:border-white hover:bg-neutral-500 hover:bg-opacity-10 hover:text-white focus:border-white focus:text-white focus:outline-none focus:ring-0 active:border-white active:text-white dark:border-white dark:text-white dark:hover:border-white dark:hover:bg-neutral-100 dark:hover:bg-opacity-10 dark:hover:text-white dark:focus:border-white dark:focus:text-white dark:active:border-white dark:active:text-white"
  data-te-ripple-init>
              Get Start
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        viewBox="0 0 24 24" class="w-6 h-6 ml-2">
        <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
    </svg>
  </NavLink>
        </div>
        <div>
          
        </div>
        <div class="carousel">
          <swiper
            :effect="'coverflow'"
            :grabCursor="true"
            :centeredSlides="true"
            :slidesPerView="'auto'"
            :coverflowEffect="{
              rotate: 20,
              stretch: 0,
              depth: 150,
              modifier: 1,
              slideShadows: true
            }"
            :loop="true"
            :modules="modules"
            :autoplay="{ delay: 10000 }"
            class="mySwiper"
          >
              <swiper-slide><img src="/PlaceImg/france.jpg" /></swiper-slide
            ><swiper-slide><img src="/PlaceImg/hmm.png" /></swiper-slide
            ><swiper-slide><img src="/PlaceImg/huh.png" /></swiper-slide
            ><swiper-slide><img src="/PlaceImg/jerry.jpg" /></swiper-slide
            ><swiper-slide><img src="/PlaceImg/rome.jpg" /></swiper-slide
            ><swiper-slide><img src="/PlaceImg/venice.jpg" /></swiper-slide>
          </swiper>
        </div>
      </div>
    </div>
  </template>

<style>
.bg {
  width: 100vw;
  z-index: -1;
  overflow-y: auto;
}

.bg-img {
  filter: brightness(50%);
}
.bg-img {
    width: 100vw;
    height: 100%;
    object-fit: cover;
}

.video-bg {
  top: 0;
  left: 0;
  width: 100%;
  height: 59.45rem;
  z-index: -2;
  filter: brightness(40%);
}

.content {
  z-index: 1;
  width: 100%;
  height: 90%;
  margin-top: 40px;
}

.Ttext {
  width: 40%;
  height: auto;
  margin-left: 100px;
  margin-top: 100px;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  position: fixed;
}
.Ttext h1{
  font-size: 5.5rem;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
}

.Ttext h2{
  font-size: 2rem;
  color: white;
}
  

.carousel {
  position: relative;
  max-width: 700px;
  height: auto;
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.25);
  border-radius: 10px;
  position: absolute;
  top: 45%;
  right: 30px;
  transform: translateY(-50%);
  z-index: 1;
  padding: 4px;
  margin-right: 20px;
  backdrop-filter: blur(6px);
  box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.6);
}


#app {
  height: 100%;
}
html,
body {
  position: relative;
  height: 100%;
}


.swiper {
  width: 100%;
  padding-top: 50px;
  padding-bottom: 50px;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  width: 350px;
  height: 350px;
  border-radius: 20px;
  
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  -webkit-box-reflect: below 1px linear-gradient(transparent,transparent,#0003);
}


@media (max-width: 1500px) {
  
  .bg {
  width: 100%;
  z-index: -1;
  height: 20rem;

}
  .carousel {
    display: flex;
    justify-content: center; 
    border: solid red; 
    position: relative;
    right: 0;
  }
.swiper-slide {
    width: 300px; 
    height: 300px;
  }
  .Ttext {
    width: 100%;
    height: auto;
    margin-left: 0;
    margin-top: 20px;
    top: 20px; 
    left: 50%;
    transform: translateX(-50%);
    border: solid red; 
    text-align: center;
    position: relative; 
    z-index: 2; 
  }
}

</style>

