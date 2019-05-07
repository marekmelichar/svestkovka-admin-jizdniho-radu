(function( $ ) {

  $(document).ready( function(){

    // const renderTHead = (resSpoje) => {
    //   return resSpoje.map((spoj) => {
    //   return `<th>
    //     ${spoj.cisloSpoje} <br/>
    //     ${spoj.poznamky}
    //     </th>`
    //   })
    // }

    window.onSaveBtn = (cisloSpoje) => {


    }

    // const renderTable = (resStanice, resSpoje, resJRad) => {

    //   console.log('resStanice, resSpoje, resJRad', resStanice, resSpoje, resJRad)

    //   // if (resStanice.length && resSpoje.length && resJRad.length) {
    //   if (resStanice.length && resSpoje.length) {
    //     // console.log('resStanice', resStanice);
    //     // console.log('resSpoje', resSpoje);
    //     // console.log('resJRad', resJRad);

    //     let thead = `<tr>
    //       <th></th>
    //       ${resSpoje.map((spoj) => {
    //         return `<th>
    //           ${spoj.cisloSpoje} <br/>
    //           ${spoj.poznamky}
    //           <button id="saveSpoj" onclick="window.onSaveBtn(${spoj.cisloSpoje})">Save</button>
    //         </th>`
    //       })}
    //     </tr>`

    //     // let thead = `<tr>
    //     //   ${renderTHead(resSpoje)}
    //     // </tr>`

    //     // let tbody = []

    //     let tbody = resStanice.map((stanice) => {
    //       return `<tr>
    //         <td>${stanice.nazevStanice}</td>
    //         <td>${stanice.casOdjezdu}</td>
    //       </tr>`
    //     })
          








    //     return tabulka_jizdniho_radu.append(
    //       `<table>
    //           <thead>${thead}</thead>
    //           <tbody>${tbody}</tbody>
    //         </table>`
    //     )
    //   }
    // }




    var isEqual = function (value, other) {

      // console.log('isEqual', value, other)

      // Get the value type
      var type = Object.prototype.toString.call(value);
    
      // If the two objects are not the same type, return false
      if (type !== Object.prototype.toString.call(other)) return false;
    
      // If items are not an object or array, return false
      if (['[object Array]', '[object Object]'].indexOf(type) < 0) return false;
    
      // Compare the length of the length of the two items
      var valueLen = type === '[object Array]' ? value.length : Object.keys(value).length;
      var otherLen = type === '[object Array]' ? other.length : Object.keys(other).length;
      if (valueLen !== otherLen) return false;
    
      // Compare two items
      var compare = function (item1, item2) {
    
        // Get the object type
        var itemType = Object.prototype.toString.call(item1);
    
        // If an object or array, compare recursively
        if (['[object Array]', '[object Object]'].indexOf(itemType) >= 0) {
          if (!isEqual(item1, item2)) return false;
        }
    
        // Otherwise, do a simple comparison
        else {
    
          // If the two items are not the same type, return false
          if (itemType !== Object.prototype.toString.call(item2)) return false;
    
          // Else if it's a function, convert to a string and compare
          // Otherwise, just compare
          if (itemType === '[object Function]') {
            if (item1.toString() !== item2.toString()) return false;
          } else {
            if (item1 !== item2) return false;
          }
    
        }
      };
    
      // Compare properties
      if (type === '[object Array]') {
        for (var i = 0; i < valueLen; i++) {
          if (compare(value[i], other[i]) === false) return false;
        }
      } else {
        for (var key in value) {
          if (value.hasOwnProperty(key)) {
            if (compare(value[key], other[key]) === false) return false;
          }
        }
      }
    
      // If nothing failed, return true
      return true;
    
    };




    // const renderTable = (resStanice, resSpoje) => {
      
    //   // console.log(resStanice, resSpoje)
      
    //   let selfStanice = []
    //   // console.log(isEqual(selfStanice, resStanice))

    //   // if(!isEqual(selfStanice, resStanice)) {
    //   //   selfStanice = resStanice
    //   // } else {
    //   //   return false;
    //   // }

    //   function renderThead() {
    //     return (`
    //       <th></th>
    //       ${resSpoje.map(spoj => {
    //         console.log('AAA', spoj)
    //         // return `<th>
    //         //   ${spoj.cisloSpoje} <br/>
    //         //   ${spoj.poznamky}
    //         // </th>`
    //       })}
    //     `)
    //   }

    //   function renderTbody() {
    //     if(selfStanice.length === 0 && resStanice.length > 0) {
    //       selfStanice = resStanice
    //       if(isEqual(selfStanice, resStanice)) {            
    //         selfStanice.map((stanice) => {
    //           console.log('BBB', stanice)

    //           // return (`<tr>
    //           //   <td>${stanice.nazevStanice}</td>
    //           //   <td>${stanice.poznamky === "Nejede" ? "" : stanice.casOdjezdu}</td>
    //           // </tr>`)
    //         })
    //       }
    //     }
    //   }

    //   return tabulka_jizdniho_radu.append(
    //     `<table>
    //         <thead>
    //           ${renderThead()}
    //         </thead>
    //         <tbody>
    //           ${renderTbody()}
    //         </tbody>
    //       </table>`
    //     )

      

    //   // return tabulka_jizdniho_radu.append(
    //   // `<table>
    //   //     <thead>
    //   //       <th></th>
    //   //       ${resSpoje.map(spoj => {
    //   //         return `<th>
    //   //         ${spoj.cisloSpoje} <br/>
    //   //         ${spoj.poznamky}
    //   //       </th>`
    //   //       })}
    //   //     </thead>
    //   //     <tbody>
    //   //       ${selfStanice.map((stanice) => {
    //   //         return `<tr>
    //   //           <td>${stanice.nazevStanice}</td>
    //   //           <td>${stanice.poznamky === "Nejede" ? "" : stanice.casOdjezdu}</td>
    //   //         </tr>`
    //   //       })}
    //   //     </tbody>
    //   //   </table>`
    //   // )







    //   // return tabulka_jizdniho_radu.append(
    //   //   resStanice.map(stanice => {
    //   //     return `<div>
    //   //       <span>${stanice.nazevStanice}</span>
    //   //     </div>`
    //   //   }),

    //   //   resSpoje.map(spoj => {
    //   //     return `<div>
    //   //       ${spoj.cisloSpoje} <br/>
    //   //       ${spoj.poznamky}
    //   //     </div>`
    //   //   })
    //   // )
    // }




    // function renderSpoje(spoj) {
    //   console.log('renderSpoje', spoj)
    //   $('#tabulka_jizdniho_radu table thead').append(`
    //     <th>
    //       ${spoj.cisloSpoje} <br/>
    //       ${spoj.poznamky}
    //     </th>
    //   `)

    //   // call STANICE
    //   const dataStanice = {
    //     'action': 'query_stanice',
    //     'idSpecSpoje': spoj.idSpecSpoje
    //   };

    //   $.get(ajaxurl, dataStanice, function(response) {
    //     const responseStanice = JSON.parse(response)
    //     // console.log('responseStanice', $('#tabulka_jizdniho_radu table tbody tr'))

    //     $('#tabulka_jizdniho_radu table tbody tr:last-child').each(row => {
    //       // console.log($('#tabulka_jizdniho_radu table tbody tr')[row])
    //       $('#tabulka_jizdniho_radu table tbody tr:last-child')[row].append(`
    //         ${responseStanice.map(st => {
    //           // console.log('STTTTTT', st)
    //           return `<td>${st.casOdjezdu}</td>`
    //         })}
    //       `)
    //     })


    //     // $('#tabulka_jizdniho_radu table tbody tr').append(`
    //     //   ${responseStanice.map(st => {
    //     //     console.log('STTTTTT', st)
    //     //     return `<td>${st.casOdjezdu}</td>`
    //     //   })}
    //     // `)
    //   });

      
    // }




    // function renderStanice(resStanice) {
    //   // console.log('renderStanice', resStanice)

    //   return(
    //     $('#tabulka_jizdniho_radu table tbody').append(`
    //     ${resStanice.map((stanice) => {
    //       return `
    //         <tr>
    //           <td>${stanice.nazevStanice}</td>
    //           <td>${stanice.poznamky === "Nejede" ? "" : stanice.casOdjezdu}</td>
    //         </tr>`
    //       })}
    //     `)
    //   )
    // }





    






    // function ajaxGetSpoje() {
    //   return new Promise((resolve, reject) => {
    //     // call SPOJE
    //     const dataSpoje = {
    //       'action': 'query_spoje'
    //     };

    //     return $.get(ajaxurl, dataSpoje, function(response) {
    //       const responseSpoje = JSON.parse(response)
    //       resSpoje = responseSpoje
    //       // console.log('response Spoje', resSpoje);
    //       resolve(resSpoje)
    //     });
    //   })
    // }





    // function ajaxGetStanice(spoj) {
    //   return new Promise((resolve,reject) => {
    //     // call STANICE
    //     const dataStanice = {
    //       'action': 'query_stanice',
    //       'idSpecSpoje': spoj.idSpecSpoje
    //     };

    //     return $.get(ajaxurl, dataStanice, function(response) {
    //       const responseStanice = JSON.parse(response)
    //       resStanice = responseStanice
    //       // console.log('response Stanice', resStanice);
    //       resolve(resStanice)
    //     });
    //   })
    // }





    // async function ajaxGetSpoje() {

    //   // call SPOJE
    //   const dataSpoje = {
    //     'action': 'query_spoje'
    //   };

    //   return await $.get(ajaxurl, dataSpoje, function(response) {
    //     // const responseSpoje = JSON.parse(response)
    //     // return responseSpoje
    //     // console.log('response Spoje', JSON.parse(response));
    //     return JSON.parse(response)
    //   });
    // }





    // async function ajaxGetStanice(spoje) {
    //   console.log('spoje', spoje)
    //   // return await spoje.map(spoj => {
    //   //   // call STANICE
    //   //   const dataStanice = {
    //   //     'action': 'query_stanice',
    //   //     'idSpecSpoje': spoj.idSpecSpoje
    //   //   };

    //   //   return $.get(ajaxurl, dataStanice, function(response) {
    //   //     console.log('response Stanice', response);
    //   //     return response
    //   //   });
    //   // })
    // }
    





    const tabulka_jizdniho_radu = $('#tabulka_jizdniho_radu')

    function compare( a, b ) {
      if ( parseInt(a.idStanice) < parseInt(b.idStanice) ){
        return -1;
      }
      if ( parseInt(a.idStanice) > parseInt(b.idStanice) ){
        return 1;
      }
      return 0;
    }

    function compareOpposite( a, b ) {
      if ( parseInt(a.idStanice) > parseInt(b.idStanice) ){
        return -1;
      }
      if ( parseInt(a.idStanice) < parseInt(b.idStanice) ){
        return 1;
      }
      return 0;
    }

    if (tabulka_jizdniho_radu[0]) {

      // call SPOJE
      const dataSpoje = {
        'action': 'query_spoje'
      };

      $.get(ajaxurl, dataSpoje, function(response) {
        const responseSpoje = JSON.parse(response)
        console.log('response Spoje', responseSpoje);

        responseSpoje.map(spoj => {
          if(spoj.smer === "0") {
            $('#smer_lovosice').append(`
              <option value="${spoj.idSpecSpoje}">${spoj.cisloSpoje} - ${spoj.poznamky}</option>
            `)
          }

          if(spoj.smer === "1") {
            $('#smer_most').append(`
              <option value="${spoj.idSpecSpoje}">${spoj.cisloSpoje} - ${spoj.poznamky}</option>
            `)
          }
        })
      });






      const renderTableDoLovosic = (stanice) => {
        const sorted = stanice.sort(compare)

        return(
          $('#table_do_lovosic tbody').append(`
          ${sorted.map((stanice) => {
            return `
              <tr>
                ${stanice.poznamky === "Nejede" ? "" : `<td>${stanice.nazevStanice}</td><td>${stanice.casOdjezdu}</td>`}
              </tr>`
            })}
          `)
        )
      }

      $('#smer_lovosice').on('change', (e) => {
        
        $('#table_do_lovosic tbody').html("")

        // call STANICE
        const dataStanice = {
          'action': 'query_stanice',
          'idSpecSpoje': e.target.value
        };
  
        return $.get(ajaxurl, dataStanice, function(response) {
          const responseStanice = JSON.parse(response)
          renderTableDoLovosic(responseStanice)
        });
      })






      const renderTableDoMostu = (stanice) => {
        const sorted = stanice.sort(compareOpposite)

        return(
          $('#table_do_mostu tbody').append(`
          ${sorted.map((stanice) => {
            return `
              <tr>
                ${stanice.poznamky === "Nejede" ? "" : `<td>${stanice.nazevStanice}</td><td>${stanice.casOdjezdu}</td>`}
              </tr>`
            })}
          `)
        )
      }

      $('#smer_most').on('change', (e) => {
        
        $('#table_do_mostu tbody').html("")

        // call STANICE
        const dataStanice = {
          'action': 'query_stanice',
          'idSpecSpoje': e.target.value
        };
  
        return $.get(ajaxurl, dataStanice, function(response) {
          const responseStanice = JSON.parse(response)
          renderTableDoMostu(responseStanice)
        });
      })







    // let resStanice = []
    // let resSpoje = []





      // async function callForData() {
      //   // const [spoje] = await Promise.all([
          
      //   // ])

      //   ajaxGetSpoje().then(spoje => {
      //     console.log('SPOJE',  JSON.parse(spoje))
      //     ajaxGetStanice(spoje)
      //   })

  
      //   // console.log('spoje', spoje)
      // }

      // callForData()
      







      // ajaxGetSpoje().then(spoje => {
      //   spoje.map(spoj => {
      //     ajaxGetStanice(spoj).then(stanice => {
      //       console.log('STANICE', stanice)
      //     })
      //   });
      // })





      // // call SPOJE
      // const dataSpoje = {
      //   'action': 'query_spoje'
      // };

      // $.get(ajaxurl, dataSpoje, function(response) {
      //   const responseSpoje = JSON.parse(response)
      //   console.log('response Spoje', responseSpoje);

      //   return responseSpoje.forEach(spoj => {
      //     console.log('SPOJ', spoj)
      //     // call STANICE
      //     const dataStanice = {
      //       'action': 'query_stanice',
      //       'idSpecSpoje': spoj.idSpecSpoje
      //     };
  
      //     return $.get(ajaxurl, dataStanice, function(response) {
      //       const responseStanice = JSON.parse(response)
      //       console.log('response Stanice', responseStanice);
      //     });
      //   })
      // });





      





      // let resJRad = []

      // call jRad

      // const dataJRad = {
      //   'action': 'query_jRad'
      // };

      // $.get(ajaxurl, dataJRad, function(response) {
      //   const res = JSON.parse(response)
      //   resJRad = res
      //   // console.log('response jRad', res);
      //   renderTable(resStanice, resSpoje, resJRad)
      // });





    }








  })











})(jQuery);
