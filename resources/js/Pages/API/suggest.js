import axios from 'axios';

const getPlaceData = async (type, sw, ne) => {
  try {
    const response = await axios.get(`https://travel-advisor.p.rapidapi.com/${type}/list-in-boundary`, {
      params: 
      {
        bl_latitude: sw.lat.toString(),
        tr_latitude: ne.lat.toString(),
        bl_longitude: sw.lng.toString(),
        tr_longitude: ne.lng.toString(),
      },
      headers: {
        'X-RapidAPI-Key': 'API',
        'X-RapidAPI-Host': 'travel-advisor.p.rapidapi.com'
      }
    });

    return response.data;
  } catch (error) {
    console.error(error);
    throw error;
  }
};

export default getPlaceData;
