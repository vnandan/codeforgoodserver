 

      
      // create the room on button press
      function linkGenerate() {
        // predefine the alphabet used.
        alert("hello");
        var alphabet = 'zxcvbnmlpokjiuhgytfdreswaq1234';
 
        // set the length of the room name
        var roomNameLength = 30;
 
        // initialize the room name as an empty string
        var roomName = '';
 
        // repeat this 30 times
        for (var i=0; i<roomNameLength; i++) {
          // get a random character from the alphabet
          var character = alphabet[Math.round(Math.random()*(alphabet.length-1))];
 
          // add the character to the roomName
          roomName = roomName + character;
        }
 
        // pre- and append appear.in URL elements
        roomName = 'https://appear.in/' + roomName + 'lite';
 		console.log(roomName);
        // return the result
        return roomName;
      }
 
      // setting a room name. Pair this with the random room generator code above for real power
     // / var roomName = randomRoomNameGenerator();
  ////////////////////////////////////////////////////////////////////////////////////////////////////    
 //////////////////////////////roomName contains the url name //////////////////////////////////////////

      // set the iframe source to load the room
      //var iframe = document.getElementById('appearin-room');
       // iframe.setAttribute('src', roomName);
     // }
 
    /*  API.isAppearinCompatible(function (data) {
        if (data.isSupported) {
          document.getElementById('compatibility-test-result').innerHTML = 'Yes';
        }
        else {
          document.getElementById('compatibility-test-result').innerHTML = 'No';
        }
      });*/
    