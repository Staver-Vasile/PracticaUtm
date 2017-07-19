window.onload = function() {

    var Hours 	= new Date().getHours();
    var Minutes	= new Date().getMinutes();
    var Day		= new Date().getDay();

    if (((Day == 6 || Day == 7) && Hours < 9) || ((Day == 6 || Day == 7) && Hours >= 18) || (Hours < 8) || (Hours >= 19)) return false;

    var iframe = document.createElement('iframe');
    iframe.style.cssText  = 'position:fixed; left:0px; bottom:0px; border:0; overflow:hidden; z-index:9999';
    iframe.id = 'CallBack';
    iframe.src = '/CreditBunButton/CallBack.html?rand='+Math.random()+'&id='+CallBackId;
    iframe.scrolling = 'no';
    iframe.width = 300;
    iframe.onload = function (){
	//this.width = this.contentWindow.document.body.scrollWidth;
    }
    document.body.appendChild(iframe);
};

window.addEventListener('message', function(Event) {
  var iframe = document.getElementById ('CallBack');
  var EventName = Event.data[0];
  var Width = Event.data[1];
  var Height = Event.data[2];

  switch (EventName) {
    case 'SetSize':
	iframe.width = Width;
	iframe.height = Height;
      break;
  }
}, false);
