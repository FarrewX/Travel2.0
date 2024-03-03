<!--โทรศัพท์ดูได้แค่แนวนอน-->

<template>
<Head title="Planner"></head>
<div class="container">
    <div class="home-btn" style="z-index: 1; color: black; position: absolute; top: 10px; margin: 5px;">
        <NavLink :href="route('home')">
            <span class="material-icons">
                home
            </span>
        </NavLink>
    </div><br>

    <section class="ui two column serch" style="position: relative; z-index: 1; margin-left: 35px; top: 70px;">
        <div class="column ">
            <form class="ui segment large form ">
                <div class="ui meggage red" v-show="error">{{ error }} </div>
                    <div class="field">
                        <div class="ui icon input large in-txt">
                            <input 
                                class="text" 
                                placeholder="Enter Any Address" 
                                v-model="address"
                                id="autocomplete"
                            >
                        </div>
                    </div>
            </form>
        <button class="ui button" id="open" @click="handleModal" style="z-index: 1;">Add</button>
        </div>
    </section>
    <div class="modal_container" v-if="showModal" style="z-index: 1;">
            <div class="modal">
                <Details 
                    v-if="showModal" 
                    :detailsData="detailsData" 
                    :selectedPlaceName="selectedPlaceName" 
                    :favPlaces="favPlaces"
                    @close-modal="hideModal" 
                />
            </div>
        </div>
        <section id="map" style="background-image: url('https://i.pinimg.com/originals/41/3c/22/413c224cd9f9760676b598939379a6e6.gif');"></section>
        <section id="list" style="background-image: linear-gradient(to top, #a6c2bb, #3fb094);">
        <div class="content">
            <h1 class="list-title">Restaurants, Hotels <br> around you</h1>
            <div class="dropdown" >
                <select id="type" v-model="type" @change="handleTypeChange" class="custom-dropdown">
                    <option value="restaurants">Restaurants</option>
                    <option value="hotels">Hotels</option>
                </select>            
            </div>
  
            <div class="card" v-for="(place, index) in places" :key="index" >
                <div class="card-container">    
                    <div class="photo"><img :src="place.photo" /> </div>
                        <div class="details">
                            <div class="header">{{ place.name }} </div>
                            <div class="address">{{ place.ADress }} </div>
                            <div class="phone">{{ place.phone }} </div> <br>
                            <div class="ranking">{{ place.ranking }} </div> <br>
                            <div class="website" v-if="place.website"><a target="_blank" :href="place.website">website</a></div>
                            <button @click="addToFavorites({name:place.name, address:place.ADress})">Add</button>
                        </div>
                </div>
            </div>    
        </div>
    </section>
   
</div>
</template>

<style>


body {
    overflow: hidden;
}

.ui.button,
.dot.circle.icon {
  border: solid rgb(0, 0, 0);
  appearance: none;
  outline: none;
  border: none;
  background: none;
  cursor: pointer;
  background-image: linear-gradient(to right, #a79678, #646337);
  border-radius: 8px;
  color: #fff;
  box-shadow: 3px 3px rgba(0, 0, 0, 0.4);
  transition: 0.4s ease-out;
}

.modal_container {
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1;
  position: absolute;
  top: 50%; /* Center vertically */
  left: 50%; /* Center horizontally */
  transform: translate(-50%, -50%); /* Center both horizontally and vertically */
  width: 80vw; /* Adjust width as needed */
  max-width: 700px; /* Set a maximum width */
}

.modal {
  padding: 30px 50px;
  width: 80vw; /* Adjust width as needed */
  max-width: 100%;
}

.dropdown {
    z-index: 1;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}


@media (min-width: 768px) {
  #list {
    width: 33.33%;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    overflow-y: auto;
  }

  #map {
    width: 66.66%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;

    .modal_container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%; /* Full width on small screens */
  }

  .modal {
    width: 100%; /* Full width on small screens */
  }

  .card-container {
    display: flex;
    flex-wrap: wrap; /* Allow cards to wrap on smaller screens */
    justify-content: center;
  }

  .card {
    margin: 0 10px 20px; /* Add some spacing between cards */
  }

  .list-title {
    font-size: 10px;
    color: black;
  }
  }

  .container{
    display: flex;
  }
  .serch{
    display: block;
    width: 450px;
  }
}

@media (max-width: 767px) { /*ยังทำไม่เสร็จ  เล็กสุด 653-fold 667-SE 740-S8+ */
  #list {
    display: flexbox;
    width: 100%;
    overflow-y: auto;
    border: solid red;
  }

  #map {
    display: flexbox;
    width: 100%;
    border: solid green;

    .modal_container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%; 
  }

  .modal {
    width: 100%;
  }

  .card-container {
    display: flex;
    flex-wrap: wrap; 
    justify-content: center;
  }

  .card {
    margin: 0 10px 20px;
  }

  .list-title {
    font-size: 10px;
    color: black;
  }
  }

  .container{
    display: flex;
  }
  .serch{
    display: block;
    position: absolute;
    width: 200px;
  }
  .in-txt{
    width: 200px;
  }
}

.pac-icon {
    display: none;
}

.pac-icon {
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
}

.pac-icon:hover {
    background-color: #7e623f;
}

.pac-icon-query {
    font-size: 16px;
}


.dropdown {
    z-index: 0;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.custom-dropdown {
    width: 200px; /* Set your desired width here */
    padding: 3px; /* Optional: Add padding for better visual appeal */
    font-size: 16px; /* Optional: Adjust font size */
}

.content h1{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 45px;
    padding: 15px 15px;
}

.card {
    display: flex;
    align-items: center;
    justify-content: center;

    
}

.card .card-container {
    margin-bottom: 15px;
    margin-top: 15px;
    color: white;
    font-size: 20px;
    width: 350px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    overflow: hidden; /* Ensure the image does not overflow the container */
}

.card .card-container .details {
    padding: 2px 16px;
}

.card .card-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 5px;
    margin: 0;
}


.card .card-container .header{
    margin-bottom: 15px;
}

.card .card-container .photo{
    margin-bottom: 15px;
}

.card .card-container .address{
    margin-bottom: 15px;
}

</style>

<script>
import axios from 'axios';
import getPlaceData from '../API/suggest.js';
import Details from '@/Pages/start/Details.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head } from '@inertiajs/vue3';

    export default {
        components: {
            Details,
            NavLink,
            Head 
        },
        data() {
            return {
                address: "",
                type: '',
                restaurants: [],
                places: [],
                selectedPlaceName:"",
                showModal: false,
                favPlaces: [],
                pType:[],
                detailsData: [],
                pname: '',
                place:'',
                
            }
        },
        mounted() {
                this.initSearch();
        },  
        methods: {
            locatorButtonPressed() {
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        position => {
                            this.getAddressForm(
                                position.coords.latitude, 
                                position.coords.longitude
                            );

                            console.log(
                                // lat long
                                position.coords.latitude, 
                                position.coords.longitude
                            );

                            this.showuserLocationOnMap(
                                position.coords.latitude, 
                                position.coords.longitude
                            );
                        },
                        error => {
                            this.error = "Can't Find Your Location";
                        } 
                    );
                } else {
                    this.error = error.message;
                    //console.log("No Support");
                }
            },
            initSearch() {
                const autocomplete = new google.maps.places.Autocomplete(
                    document.getElementById("autocomplete"),
                    {
                        types: ['geocode']
                    }
                );

                autocomplete.addListener('place_changed', () => {
                    var place = autocomplete.getPlace();
                    var inputValue = place.name + " " + place.formatted_address;
                    //console.log(inputValue);
                    // autocomplete
                    this.getAddressGeo(inputValue);
                    
                    this.selectedPlaceName = place.name

                    console.log(this.selectedPlaceName);

                    this.getData(place.name);
                });
            },
            getAddressGeo(ad) {
                axios.get(`/geocode?address=${encodeURIComponent(ad)}`)
                .then(response => {
                    if(response.data.error_message) {
                        console.log(response.data.error_message);
                    } else {
                        const location = response.data.results[0].geometry.location;
                        const bounds = response.data.results[0].geometry.viewport;

                        //console.log(bounds);
                        this.showUserLocationOnMap(location.lat, location.lng);
                        //console.log(`Latitude: ${location.lat}, Longitude: ${location.lng}`);
                        this.detailsData.push(this.type);
                        console.log(this.type);
                        this.fetchData(this.type, bounds.northeast, bounds.southwest);
                    };
                })
                .catch(error => {
                    console.log(error.message);
                })
            },
            showUserLocationOnMap(latitude, longitude) {
                let map = new google.maps.Map(document.getElementById("map"), {
                    zoom:15,
                    center: new google.maps.LatLng(latitude, longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map
                    
                });

            },
            async fetchData(type, boundSw, boundNe) {
                try {
                    const data = await getPlaceData(type, boundSw, boundNe);
                    //console.log(data);
                    if (data.data && Array.isArray(data.data)) {

                        console.log(data)
                        const filteredData = data.data.filter(place => place.name && place.name.trim() !== "");

                        const places = filteredData;
                        
                        console.log(places);

                        // Clear the existing places before adding new ones
                        this.places = [];

                        // Push each place to the places array
                        places.forEach(place => {
                            this.places.push({
                                name: place.name,
                                ADress: place.address,
                                phone: place.phone,
                                photo: place.photo
                                ? place.photo.images.large.url
                                : 'https://www.foodserviceandhospitality.com/wp-content/uploads/2016/09/Restaurant-Placeholder-001.jpg',
                                ranking: place.ranking,
                                website: place.website, 
                                // Add other details you want to display
                            });
                        });

                        // You can also update other components or perform additional actions here
                    } else {
                        console.error('Invalid data structure:', data);
                    }

                } catch (error) {
                    // Handle error
                    console.error('Error fetching data:', error);
                }
            },
            handleTypeChange(event) {
                this.type = event.target.value;
            },
            getData(name) {
                this.modalData = name;

                const details = {
                    Name: name
                };
                console.log(details);
            },
            handleModal() {
                this.showModal = true
                //this.detailsData = this.getData(this.address);
            },

            hideModal() {
                this.showModal = false;
            },
            addToFavorites(place) {
                this.favPlaces.push(place);
                console.log(this.favPlaces);
            },
            
        },
}
</script>