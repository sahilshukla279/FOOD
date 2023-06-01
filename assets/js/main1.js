let container=document.getElementById('chatbot-container');

let btn=document.getElementById('btn');

   let form=document.getElementById('form');

let arr1=[

  { name:"Hello",text:"hi! How are you?"},

  { name:"Hii",text:"hello there!! How may I help you?"},

  { name:"i am fine",text:"that's good to hear"},

  { name:"i\'m fine",text:"that\'s good to hear"},

  { name:"how are you",text:"i am fine,thanks, how about you?"},

  { name:"what is your name",text:"I am FoodBot, your FOOD Assistant"},

  { name:"what is the maximum time taken for pickup of food",text:"The time for picking up the food will depend upon the location and weight of the donations, after going through all the details which you have filled up, we will reach out to you through SMS and inform you about the pickup time"},

   { name:"What type of donation are possible through this application",text:"Donor can donate three things which are food, clothes & utensils."},

   { name:"till what time does this application works",text:"24x7, 365 days"},

   { name:"how does this application work",text:"A donor is required to register with valid credentials. After successful registration, one can login and fill out the donation form our team will reach out to you."},

   { name:"How to fill donation form",text:"One is expected to login using donate button which is at the top of the page and fill out the donation form."},

   { name:"What would donor receive after donating",text:"Once the donation has been donated which was proposed by the donor he experience Sense of Happiness, peace of mind and he also receive some blessing from the receiver, The food organization will also award you with a donation certificate."},

   { name:"How can we contact the organization",text:"Once can visit contact section in Home Page."},

   { name:"Will the helper volunteer will be paid",text:"Right now we does not pay helper volunteer but maybe in the future we can."},

   { name:"How to be the part of the organization",text:"One can register as a helper volunteer and can act as a bridge between the donor and the recipient"},

   { name:"Is a position of helper volunteer job is full time job",text:"No, Helper volunteer can work according to their convenience "},

   { name:"Will donor will be notified is donation is donated",text:"Yes, donor will be notified for everything like if volunteer has accepted the job or volunteer has received the donation or whether it is about the donation has been made or not."},

   { name:"How to register as a helper volunteer",text:"A Volunteer is required to register by using volunteer option which is at the top of the page. After successful registration, one can login and act as a helper volunteer."},

   { name:"How to get full-time job in the organization",text:"One can contact the organization regarding job and opportunity."},

   { name:"What if there is no helper volunteer in the vicinity of donor",text:"The job will be directly assign to organization volunteer."},
   
   { name:"Whether the details of donor and helper volunteer is secure with the organization",text:"Yes, the details of donor and helper volunteer are secure and you can trust us"},

   

   
  

];

const SpeechRecognition=window.SpeechRecognition || window.webkitSpeechRecognition ;

const recorder=new SpeechRecognition();

// recorder.onstart=()=>{

// console.log('voice is active');

//  btn.innerHTML=" voice is active";

// }

// recorder.onend=()=>{

//   btn.innerHTML=" start voice";

// }

function botVoice(message){

 const speech= new SpeechSynthesisUtterance();

 speech.text="I am unbale to aswer";

 for(let botData of arr1){

  if(message.includes(botData.name.toLowerCase())){

   speech.text=botData.text

  }

 }

container.innerHTML+=`<p class="speech">${speech.text}</p>`;

speech.volume=1;

speech.rate=1;

speech.pitch=1;

 window.speechSynthesis.speak(speech);

}

recorder.onresult=(event)=>{

 console.log(event);

 const current=event.resultIndex;

  const transcript=event.results[current][0].transcript;

   container.innerHTML+=`<p class="recorder">${transcript}</p>`;

   botVoice(transcript.toLowerCase());

}

function startVoice(){

 recorder.start();

}

form.onsubmit=(e)=>{

 e.preventDefault();

    let formInput=document.getElementById('botvalue').value;

if(formInput==''){

 return false;

}

else{

container.innerHTML+=`<p class="recorder">${formInput}</p>`;

    botVoice(formInput.toLowerCase());

form.reset();

   return true;

}

}



function openForm() {
    document.getElementById("main-container").style.display="block";
}