   var xmlHttp = buatObjekXmlHttp();
   var xmlHttp2 = buatObjekXmlHttp2();
   var xmlHttp3 = buatObjekXmlHttp3();
   
   function buatObjekXmlHttp()
   {
      var obj = null;
      if (window.ActiveXObject)
         obj = new ActiveXObject("Microsoft.XMLHTTP");   
      else 
         if (window.XMLHttpRequest)
            obj = new XMLHttpRequest();
          
      // Cek isi xmlHttp
      if (obj == null)
         document.write(
            "Browser tidak mendukung XMLHttpRequest");      
      return obj;    
   }
   
   function buatObjekXmlHttp2()
   {
      var obj = null;
      if (window.ActiveXObject)
         obj = new ActiveXObject("Microsoft.XMLHTTP");   
      else 
         if (window.XMLHttpRequest)
            obj = new XMLHttpRequest();
          
      // Cek isi xmlHttp
      if (obj == null)
         document.write(
            "Browser tidak mendukung XMLHttpRequest");      
      return obj;    
   }

   function buatObjekXmlHttp3()
   {
      var obj = null;
      if (window.ActiveXObject)
         obj = new ActiveXObject("Microsoft.XMLHTTP");   
      else 
         if (window.XMLHttpRequest)
            obj = new XMLHttpRequest();
          
      // Cek isi xmlHttp
      if (obj == null)
         document.write(
            "Browser tidak mendukung XMLHttpRequest");      
      return obj;    
   }
        
   function ambilData(sumber_data, id_elemen)
   { 
      if (xmlHttp != null)
      {
         var obj = document.getElementById(id_elemen);
         xmlHttp.open("GET", sumber_data, true);

         xmlHttp.onreadystatechange = function ()
         {
            if (xmlHttp.readyState == 4 &&
                xmlHttp.status == 200)
            {
               obj.innerHTML = xmlHttp.responseText;
            }
         }  
         
         xmlHttp.send(null);
      }
   }
   
   function ambilData2(sumber_data2, id_elemen)
   { 
      if (xmlHttp2 != null)
      {
         var obj = document.getElementById(id_elemen);
         xmlHttp2.open("GET", sumber_data2, true);

         xmlHttp2.onreadystatechange = function ()
         {
            if (xmlHttp2.readyState == 4 &&
                xmlHttp2.status == 200)
            {
               obj.innerHTML = xmlHttp2.responseText;
            }
         }  
         
         xmlHttp2.send(null);
      }
   }

   function ambilData3(sumber_data3, id_elemen)
   { 
      if (xmlHttp3 != null)
      {
         var obj = document.getElementById(id_elemen);
         xmlHttp3.open("GET", sumber_data3, true);

         xmlHttp3.onreadystatechange = function ()
         {
            if (xmlHttp3.readyState == 4 &&
                xmlHttp3.status == 200)
            {
               obj.innerHTML = xmlHttp3.responseText;
            }
         }  
         
         xmlHttp3.send(null);
      }
   }