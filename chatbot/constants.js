// Options the user could type in
let date=new Date(); 
var currentdate=new Date().toLocaleDateString();
var time=new Date().toLocaleTimeString();
const prompts = [
  ["hi", "hello", "hey"],
  ["how to donate", "donation process", "donate food", "can I donate food?","how to donate food"],
  ["where can I donate", "nearby donation points", "pickup for donation"],
  ["what type of food can I donate", "donation rules", "can I donate cooked food?"],
  ["is my food eligible for donation?", "packaging instructions for donations"],
  ["who gets the food", "who benefits from donations", "where does my donation go"]
];

const replies = [
  ["Hello! How can I assist you today?"],
  ["You can donate through our website or app. We accept raw, cooked, and packed foods."],
  ["Our volunteers will pick up the food from your location. Contact us for pickup scheduling."],
  ["You can donate fresh, unopened, and unexpired raw ingredients, properly packed cooked food, or sealed packed food."],
  ["Ensure food is packed in airtight containers or labeled with the preparation date and type."],
  ["Your donation helps feed underprivileged individuals and families. Visit our website for impact stories."]
];


  
  // Random for any other user input
  
  const alternative = [
    // "Same",
    // "Go on...",
    // "Bro...  i don't know",
    // "Try again",
    // // "I'm listening...:/",
    // "I don't understand ",
    " 😢sorry i am still under development "
  ]
  
  // Whatever else you want :)
  
  const coronavirus = ["Please stay home", "Wear a mask", "Fortunately, I don't have COVID", "These are uncertain times"]