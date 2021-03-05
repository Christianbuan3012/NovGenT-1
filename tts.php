<?php
    include_once 'include/setUp.php';
    include 'include/connect.php';
    include 'include/dbHandler.php';
    require 'header.php'
?>
<div class="mainbox">

    <h2 style="font-size: 20px;">Select Voice:</h2> 
    <select id='voiceList' style="appearance: none;background-color: #1DA1F2;padding: 0 1em 0 0;margin: 0;width: 100%;font-family: inherit;font-size: inherit;cursor: inherit;line-height: inherit; color: white; padding: 10px;border-radius: 5px;"></select> 
    <br><br>

    <input id='txtInput' / style="width:50%; height: 100px; text-align: center;font-size: 20px; "> <br><br>    
    <button id='btnSpeak' style="color: white; background-color: #03C04A; border: none; padding: 10px; border-radius: 5px;">Speak!</button>

    <script>
        var txtInput = document.querySelector('#txtInput');
        var voiceList = document.querySelector('#voiceList');
        var btnSpeak = document.querySelector('#btnSpeak');
        var synth = window.speechSynthesis;
        var voices = [];

        PopulateVoices();
        if(speechSynthesis !== undefined){
            speechSynthesis.onvoiceschanged = PopulateVoices;
        }

        btnSpeak.addEventListener('click', ()=> {
            var toSpeak = new SpeechSynthesisUtterance(txtInput.value);
            var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
            voices.forEach((voice)=>{
                if(voice.name === selectedVoiceName){
                    toSpeak.voice = voice;
                }
            });
            synth.speak(toSpeak);
        });

        function PopulateVoices(){
            voices = synth.getVoices();
            var selectedIndex = voiceList.selectedIndex < 0 ? 0 : voiceList.selectedIndex;
            voiceList.innerHTML = '';
            voices.forEach((voice)=>{
                var listItem = document.createElement('option');
                listItem.textContent = voice.name;
                listItem.setAttribute('data-lang', voice.lang);
                listItem.setAttribute('data-name', voice.name);
                voiceList.appendChild(listItem);
            });

            voiceList.selectedIndex = selectedIndex;
        }
    </script>
</div>
</body>
</html>
