
const getGeolocate = () =>{
    const param = {
        considerIp: true
    }
    return fetch('https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0', {
        method: 'post',
        headers: {
            'Content-Type':'applicaiton/json'
        },
    })
    .then((res) => res.json())
    .then((data) => data.location)
}

const getClientLocationInfo = () => {
    return new Promise( async (resolve, reject) => {
        const geolocate = await getGeolocate();
        const lat = geolocate.lat;
        const lng = geolocate.lng;
        fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0`)
        .then((res) => res.json())
        .then((data) => {
            let clientLocation = [];
            for (let i = 0; i < data.results[0].address_components.length; i++) {
                for (let j = 0; j < data.results[0].address_components[i].types.length; j ++) {
                    if (data.results[0].address_components[i].types[j] == "postal_code") {
                        clientLocation.push({
                            'postal_code': data.results[0].address_components[i].long_name
                        })
                    }
                    if (data.results[0].address_components[i].types[j] == "country") {
                        clientLocation.push({
                            'country': data.results[0].address_components[i].long_name
                        })
                    }
                    if (data.results[0].address_components[i].types[j] == "administrative_area_level_1") {
                        clientLocation.push({
                            'state': data.results[0].address_components[i].long_name
                        })
                    }
                    if (data.results[0].address_components[i].types[j] == "locality") {
                        clientLocation.push({
                            'city': data.results[0].address_components[i].long_name
                        })
                    }
                }

            }

            resolve(clientLocation);
        }).catch((err) => reject(err))
    })
}

/* Get Zip Code */
const getZipCode = () => {
    return new Promise( async (resolve, reject) => {
        const geolocate = await getGeolocate();
        const lat = geolocate.lat;
        const lng = geolocate.lng;
        fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0`)
        .then((res) => res.json())
        .then((data) => {
            for (let i = 0; i < data.results[0].address_components.length; i++) {
                for (let j = 0; j < data.results[0].address_components[i].types.length; j ++) {
                    if (data.results[0].address_components[i].types[j] == "postal_code") {
                        var zip_code = data.results[0].address_components[i].long_name
                    }
                }

            }
            resolve(zip_code);
        }).catch((err) => reject(err))
    })
}

/* Get City */
const getCity = () => {
    return new Promise( async (resolve, reject) => {
        const geolocate = await getGeolocate();
        const lat = geolocate.lat;
        const lng = geolocate.lng;
        fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0`)
        .then((res) => res.json())
        .then((data) => {
            for (let i = 0; i < data.results[0].address_components.length; i++) {
                for (let j = 0; j < data.results[0].address_components[i].types.length; j ++) {
                    if (data.results[0].address_components[i].types[j] == "locality") {
                        var city = data.results[0].address_components[i].long_name
                    }
                }

            }
            resolve(city);
        }).catch((err) => reject(err))
    })
}

/* Detect Visitor's current location */
const detectedUserLocation = () => {
    return new Promise( async (resolve, reject) => {
        const geolocate = await getGeolocate();
        const lat = geolocate.lat;
        const lng = geolocate.lng;
        fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lng}&key=AIzaSyCvRwR3-fGr8AsnMdzmQVkgCdlWhqUiCG0`)
        .then((res) => res.json())
        .then((data) => {
            const currentLocatoinCode = data.plus_code.compound_code;
            let arr = currentLocatoinCode.split(' ');
            let curLoc = '';
            for (let i = 1; i < arr.length; i++) {
                curLoc += arr[i] + ' ';
            }
            resolve(curLoc.trim());
        }).catch((err) => reject(err))
    })
}

const fetchIpInfo = () => {
    return fetch('https://ipinfo.io/json')
    .then((res) => res.json())
    .then((data) => data)
}

const fetchIp_api = () => {
    return fetch('http://ip-api.com/json')
    .then((res) => res.json())
    .then((data) => data)
}

const getClientTimezone = async () => {
    var clientInfo = await fetchIpInfo();

    if (clientInfo == undefined || clientInfo.length == 0) {
        clientInfo = await fetchIp_api();
    }
    return clientInfo.timezone;
}