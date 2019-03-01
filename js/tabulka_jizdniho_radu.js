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

    const renderTable = (resStanice, resSpoje, resJRad) => {

      if (resStanice.length && resSpoje.length && resJRad.length) {
        // console.log('resStanice', resStanice);
        // console.log('resSpoje', resSpoje);
        // console.log('resJRad', resJRad);

        let thead = `<tr>
          <th></th>
          ${resSpoje.map((spoj) => {
            return `<th>
              ${spoj.cisloSpoje} <br/>
              ${spoj.poznamky}
              <button id="saveSpoj" onclick="window.onSaveBtn(${spoj.cisloSpoje})">Save</button>
            </th>`
          })}
        </tr>`

        // let thead = `<tr>
        //   ${renderTHead(resSpoje)}
        // </tr>`

        // let tbody = []

        let tbody = resStanice.map((stanice) => {
          return `<tr>
            <td>${stanice.nazevStanice}</td>

            ${resJRad.map((item) => {
              if (stanice.id === item.idStanice) {
                return `<td>${item.casOdjezdu}</td>`
              }
            })}
          </tr>`
        })








        return tabulka_jizdniho_radu.append(
          `<table>
              <thead>${thead}</thead>
              <tbody>${tbody}</tbody>
            </table>`
        )
      }
    }





    const tabulka_jizdniho_radu = $('#tabulka_jizdniho_radu')

    let resStanice = []
    let resSpoje = []
    let resJRad = []

    if (tabulka_jizdniho_radu[0]) {

      // call STANICE

      const dataStanice = {
        'action': 'query_stanice'
      };

      $.get(ajaxurl, dataStanice, function(response) {
        const res = JSON.parse(response)
        resStanice = res
        // console.log('response Stanice', res);
        renderTable(resStanice, resSpoje, resJRad)
      });





      // call SPOJE

      const dataSpoje = {
        'action': 'query_spoje'
      };

      $.get(ajaxurl, dataSpoje, function(response) {
        const res = JSON.parse(response)
        resSpoje = res
        // console.log('response Spoje', res);
        renderTable(resStanice, resSpoje, resJRad)
      });






      // call jRad

      const dataJRad = {
        'action': 'query_jRad'
      };

      $.get(ajaxurl, dataJRad, function(response) {
        const res = JSON.parse(response)
        resJRad = res
        // console.log('response jRad', res);
        renderTable(resStanice, resSpoje, resJRad)
      });





    }








  })











})(jQuery);
