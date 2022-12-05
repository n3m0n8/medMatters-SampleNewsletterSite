///////////////// COMPILATION \\\\\\\\\\\\\\\
// notes with *  are deprecated/older constructs.

//country switcher Array and nested objects\\
const countriesArray = [
        {
            name: 'Albania',
            code: 'al',
            continent: 'europe',
            mapCode: '17.424467755298576%2C39.12993285804597%2C22.851713849048576%2C42.68231468026076',
        },
        {
            name: 'Algeria',
            code: 'ag',
            continent: 'africa',
            mapCode: '-27.553758117311062%2C25.044676432747885%2C9.580030945188943%2C40.74632389224111',
        },
        {
            name: 'Bosnia',
            code: 'bk',
            continent: 'europe',
            mapCode: '5.053710937500001%2C39.8928799002948%2C23.620605468750004%2C46.7248003746672',
        },
        {
            name: 'Bulgaria',
            code: 'bu',
            continent: 'europe',
            mapCode: '18.40156403869472%2C40.82218182594311%2C27.68501130431972%2C44.28459181145011',
        },
        {
            name: 'Croatia',
            code: 'hr',
            continent: 'europe',
            mapCode: '9.52518548224006%2C42.83565411209814%2C18.808632747865058%2C46.187397704694575',
        },
        {
            name: 'Cyprus',
            code: 'cy',
            continent: 'europe',
            mapCode: '31.8190741863367%2C34.55179234969665%2C34.13993600274295%2C35.514324337539804',
        },
        {
            name: 'Egypt',
            code: 'eg',
            continent: 'africa',
            mapCode: '24.14581733545954%2C27.68376438567208%2C33.42926460108455%2C31.76576428684171',
        },
        {
            name: 'France',
            code: 'fr',
            continent: 'europe',
            mapCode: '-10.305014590074395%2C43.00404667466678%2C8.261879941175609%2C49.49614124332926',
        },
        {
            name: 'Greece',
            code: 'gr',
            continent: 'europe',
            mapCode: '19.704249877385333%2C37.07280465352941%2C24.345973510197833%2C38.925320870013856',
        },
        {
            name: 'Israel',
            code: 'is',
            continent: 'middle-east',
            mapCode: '34.305572099166085%2C31.904928051437352%2C34.88578755326765%2C32.15407548197036',
        },
        {
            name: 'Italy',
            code: 'it',
            continent: 'europe',
            mapCode: '0.6151459798391291%2C38.32533027276319%2C19.182040511089134%2C45.32206982356573',
        },
        {
            name: 'Jordan',
            code: 'jo',
            continent: 'middle-east',
            mapCode: '34.730521335618825%2C31.205696008148248%2C37.051383152025075%2C32.20577183172869',
        },
        {
            name: 'Kosovo',
            code: 'kv',
            continent: 'europe',
            mapCode: '19.278259277343754%2C42.07376224008722%2C21.59912109375%2C42.94033923363183',
        },
        {
            name: 'Lebanon',
            code: 'le',
            continent: 'middle-east',
            mapCode: '33.51678491396481%2C33.401381248051436%2C35.83764673037106%2C34.377191634975766',
        },
        {
            name: 'Libya',
            code: 'ly',
            continent: 'africa',
            mapCode: '4.854620704406939%2C26.39226500103219%2C23.421515235656944%2C34.488811596836555',
        },
        {
            name: 'Malta',
            code: 'mt',
            continent: 'europe',
            mapCode: '13.58736665720604%2C35.71636458149767%2C14.747797565409169%2C36.192152186444524',
        },
        {
            name: 'Montenegro',
            code: 'mj',
            continent: 'europe',
            mapCode: '15.820526988257837%2C41.569827527147076%2C20.46225062107034%2C43.30478114481165',
        },
        {
            name: 'Morocco',
            code: 'mo',
            continent: 'africa',
            mapCode: '-20.983990713056848%2C28.94249643070718%2C-2.417096181806846%2C36.828369924358924',
        },
        {   name: 'North-Macedonia',
            code: 'mk',
            continent: 'europe',
            mapCode: '18.517513251556263%2C40.38816626197067%2C23.159236884368763%2C42.15503501242262',
        },
        {
            name: 'Palestine',
            code: 'we',
            continent: 'middle-east',
            mapCode: '34.51356442888687%2C31.54109425316663%2C35.67399533709%2C32.04068090772543',
        },
        {
            name: 'Portugal',
            code: 'po',
            continent: 'europe',
            mapCode: '-14.45716025889918%2C37.30889162459767%2C-5.173712993274178%2C40.95489506251575',
        },
        {
            name: 'Serbia',
            code: 'ri',
            continent: 'europe',
            mapCode: '17.967886162314528%2C43.083976081850494%2C22.609609795127035%2C44.77700153470316',
        },
        {
            name: 'Slovenia',
            code: 'si',
            continent: 'europe',
            mapCode: '11.35457160615701%2C45.23967006466086%2C15.99629523896951%2C46.87105474749234',
        },
        {
            name: 'Spain',
            code: 'sp',
            continent: 'europe',
            mapCode: '-15.863862634133971%2C36.84368867029221%2C2.703031897116031%2C43.99212042060034',
        },
        {
            name: 'Syria',
            code: 'sy',
            continent: 'middle-east',
            mapCode: '35.44466451200026%2C33.034579635405585%2C37.76552632840651%2C34.01454271050354',
        },
        {
            name: 'Tunisia',
            code: 'ts',
            continent: 'africa',
            mapCode: '-0.3515625%2C28.01380137638074%2C18.215332031250004%2C35.97800618085566',
        },
        {
            name: 'Turkiye',
            code: 'tu',
            continent: 'middle-east',
            mapCode: '26.35611537657186%2C37.622791335522685%2C35.639562642196864%2C41.252897408857386',
        },
    ]; 
// *instantiate countries array and current country\\
// *loaded status for initial loading : 
// *let loaded;
//instantiate and define index and tracking construct\\
const countriesArrayLength =  countriesArray.length;
   // console.log(countriesArrayLength);
let indxPos = countriesArrayLength-27;
const nameContainer = document.getElementById('countryName');
const paraContainer = document.getElementById('countryText');
// *let countryIndxPos;
// *let tracker;
// *let indxPos;
//URLS & sanitisation\\
const baseImgURL = 'https://api.unsplash.com/photos/random/?';
const baseMapURL = 'https://www.openstreetmap.org/export/embed.html';
const baseJsonURL = 'https://raw.githubusercontent.com/factbook/factbook.json/master';
    function sanitiseURLs (){
        const sanitiseRegexp = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;
        let imgURLIsSanitised = sanitiseRegexp.test(baseImgURL); 
        let mapURLIsSanitised = sanitiseRegexp.test(baseMapURL); 
        let jsonIsSanitised = sanitiseRegexp.test(baseJsonURL);
            if (imgURLIsSanitised === true && mapURLIsSanitised === true && jsonIsSanitised === true){
                console.log('URLs correct.');
            }
            else {
                console.log('URL error.');
                throw new Error('URL_Sanitisation_Err');
            }
    }
//map switcher\\
function fetchMap(){
    let mapContainer = document.getElementById('countryMap');
    mapContainer.src = `${baseMapURL}?bbox=${countriesArray[indxPos].mapCode}&amp;layer=mapnik`;
}
//fetch country JSON file | todo -- add async-await and a timed promise const later to default to normal text if fetch fails?\\
function fetchJson(){
    let rawCountryData;
        fetch(`${baseJsonURL}%2F${countriesArray[indxPos].continent}%2F${countriesArray[indxPos].code}.json`).then(
            function (response){
                return response.json();
            }
        ).then(function (data){
            console.log(data);
            rawCountryData = data;
            return rawCountryData;
        }).then(()=>{
            let countryName = rawCountryData.Government['Country name']['conventional short form'].text.replace(/<\/?[^>]+(>|$)/g, "");
            let countryDetails = rawCountryData.Introduction.Background.text.replace(/<\/?[^>]+(>|$)/g, "");
            let nameContent = document.createTextNode(countryName);
                nameContainer.appendChild(nameContent);
            let paraContent = document.createTextNode(countryDetails);
                paraContainer.appendChild(paraContent);
        }).catch(()=>{
                console.log('Something went wrong with fetching country information.');
            });
}
// single random Unsplash country image Api Fetcher\\
//window.addEventListener('load', fetchImg);
function fetchImg() {
    const imgURL = `${baseImgURL}query=${countriesArray[indxPos].name}&count=1&client_id=************************`;
  //console.log(imgURL);
  let imgPlacehold  = document.getElementById('countryImg');
  //let rawImgData;
    fetch(imgURL)
        .then((res) => {return res.json()})
        .then((dta) => {
            console.log(dta);
            imgPlacehold.src = dta[0].urls.regular;
        }).catch((err)=>{
            console.log(`${err} : There was a problem with fetching the image.`);
        });
    }
    function refreshImg(){
      fetchImg();
    }
    //Old constructs\\

//instantiate the traversal buttons\\
//const prevCountry = document.getElementById('prevCountry');
//const nextCountry = document.getElementById('nxtCountry');

//let goPrev;
//let goNext;
//const prev = document.getElementById('prev');
//const next = document.getElementById('next');
   // prev.addEventListener('click', ()=>{
    //    goPrev === true;
   // });
   // next.addEventListener('click', ()=>{
    //    goNext === true;
   // });
//Array Traversal functions \\
// next

///////////////RUNTIME EXECUTION \\\\\\\\\\\\\\\

function traverse(value){
    if (value === 'prev'){
        if (indxPos >=1){
            indxPos--;
        }
        else {
            indxPos = 0;
        }
        console.log(indxPos);
        paraContainer.textContent = '';
        nameContainer.textContent = '';
        //return indxPos;
        fetchMap(indxPos);
        fetchJson(indxPos);
        fetchImg(indxPos);
        setInterval(refreshImg, 30000);
    }
    else if(value === 'next'){
        if (indxPos <=25){
            indxPos++;
        }
        else {
            indxPos = 26;
        }
        console.log(indxPos);
        paraContainer.textContent = '';
        nameContainer.textContent = '';
        fetchMap(indxPos);
        fetchJson(indxPos);
        fetchImg(indxPos);
        //return indxPos;
        setInterval(refreshImg, 30000);
    }
}

//the above are buggy - todo : fixed multiple repetitive calls when hitting button.
console.log(indxPos);
    fetchMap(indxPos);
    fetchJson(indxPos);
    fetchImg(indxPos);
    setInterval(refreshImg, 30000);

//Old constructs\\
    /*function nxtCountry(){
        
        console.log(i);
        //loaded = false;
        //console.log(loaded);
        console.log(countryIndxPos);
        fetchMap(i);
        fetchJson(i);
        fetchImg(i);
        //setInterval(refreshImg, 30000);
    }
    // previous
    function prvCountry(){      
        i = countryIndxPos--;
        console.log(i);
        //loaded = false;
        //console.log(loaded);
        sanitiseURLs();
        fetchMap(i);
        fetchJson(i);
        fetchImg(i);
        //setInterval(refreshImg, 30000);
    }    

    //window.addEventListener('load', (event) => {
      //  loaded = true;
    //});
    //if (loaded === true){
      //  i = strtIndxPos;
    //}
    //else if (loaded === false){
      //  i = tracker;
    //}
    countryIndxPos = strtIndxPos;
    i = countryIndxPos;
        sanitiseURLs();
        setMap(i);
        fetchJson(i);
        fetchImg(i);
        //setInterval(refreshImg, 30000);    
    //});
  */
//define button event listeners\\
    
    //console.log(`Country is now: ${currCountry.name}`); 

