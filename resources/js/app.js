import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

if (typeof adminID !== "undefined") {
  // private channel
  var channel = Echo.private(`App.Models.Admin.${adminID}`);
  channel.notification(function (data) {
    alert(JSON.stringify(data));
  });
}
// private channel
var channel = Echo.private(`deliveries.${orderId}`);
channel.listen('.map-location',function (data) {
  marker.setPosition({
    lat: Number(data.lat),
    lng: Number(data.lng),
  });

  map.setCenter({
    lat: Number(data.lat),
    lng: Number(data.lng),
  });

});
