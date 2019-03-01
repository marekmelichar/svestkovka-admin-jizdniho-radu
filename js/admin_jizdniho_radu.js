(function( $ ) {

  $(document).ready( function(){

    const select_direction = $('#select_direction')
    const select_date = $('#select_date')
    const select_train = $('#select_train')

    $('#sortable_first_col').sortable({
      placeholder: "ui-state-highlight",
      connectWith: "#sortable_col_removed_items"
    })

    $('#sortable_col_removed_items').sortable({
      connectWith: "#sortable_first_col"
    })

    $('#sortable_first_col').disableSelection();
    $('#sortable_col_removed_items').disableSelection();













    const add = $('#add')
    const add_input = $('#add_input')
    const sortable_col_removed_items = $('#sortable_col_removed_items')
    const sortable_first_col = $('#sortable_first_col')
    const remove = $('.remove')

    add.on('click', () => {
      sortable_first_col.append(`<li class="ui-sortable-handle">${add_input.val()} <button class="remove">Remove</button></li>`)

      add_input.val('')
    })

    $(document).on('click', '.remove', function(e){
      console.log('11111', e);
      $(e.target).parent()[0].remove()
    });














    const saveBtn = $('#save')

    saveBtn.on('click', e => {

      let dataArray = []

      const itemsToDelete = $('#sortable_first_col li')
      const itemsToDeleteArray = Array.from(itemsToDelete)

      itemsToDeleteArray.forEach(itm => {
        console.log(itm);

        let idUseku = $(itm).data('iduseku')
        let pocatecniStaniceUseku = $(itm).find('.pocatecni_stanice_useku').html()
        let koncovaStaniceUseku = $(itm).find('.koncova_stanice_useku').html()

        dataArray.push({
          idUseku: idUseku,
          pocatecniStaniceUseku: pocatecniStaniceUseku,
          koncovaStaniceUseku: koncovaStaniceUseku,
          idSpecSpoje: select_train.val()
        })
      })

      const data = {
  			'action': 'delete_usek_from_DB',
  			'data': dataArray
  		};

  		$.post(ajaxurl, data, function(response) {
  			console.log('response', response);
  		});
    })





    $( "#select_date" ).datepicker();





    select_direction.on('change', e => {
      // console.log(e.target.value);
    })

    select_date.on('change', e => {
      // console.log(e.target.value);
      const select_direction_value = select_direction.val()
      const format = select_date.datepicker("option", "dateFormat", "yy-mm-dd");

      // console.log(select_direction_value, e.target.value);

      if (select_direction_value !== "") {
        const data = {
    			'action': 'query_spoju_from_DB',
    			'select_direction_value': select_direction_value,
          'date': e.target.value
    		};

    		$.post(ajaxurl, data, function(response) {
    			// console.log('response of query_spoju_from_DB', response, typeof response);
          // console.log('response', JSON.parse(response));

          const res = JSON.parse(response)

          res.map(itm => {
            return select_train.append(`<option value="${itm.idSpecSpoje}">${itm.cisloSpoje} - ${itm.poznamky}</option>`)
          })

    		});
      }
    })





    select_train.on('change', e => {

      // console.log(e.target.value);

      const select_direction_value = select_direction.val()
      const idSpecSpoje = e.target.value;
      const date = select_date.val()

      if (select_direction_value !== "") {
        const data = {
    			'action': 'query_useky_from_DB',
    			'select_direction_value': select_direction_value,
          'idSpecSpoje': idSpecSpoje,
          'date': date
    		};

    		$.post(ajaxurl, data, function(response) {
    			// console.log('response of query_useky_from_DB', response, typeof response);
          // console.log('response', JSON.parse(response));

          const res = JSON.parse(response)
          console.log('RES', res);

          res.map(itm => {
            if (itm.poradi_useku === null) {
              sortable_col_removed_items.append(`
                <li data-iduseku=${itm.id_useku}>
                  <span class="pocatecni_stanice_useku">${itm.pocatecni_stanice_useku}</span> ->
                  <span class="koncova_stanice_useku">${itm.koncova_stanice_useku}</span>
                  <button class="remove">Remove</button>
                </li>
              `)
            } else {
              sortable_first_col.append(`
                <li data-iduseku=${itm.id_useku}>
                  <span class="pocatecni_stanice_useku">${itm.pocatecni_stanice_useku}</span> ->
                  <span class="koncova_stanice_useku">${itm.koncova_stanice_useku}</span>
                  <button class="remove">Remove</button>
                </li>
              `)
            }
          })
    		});
      }
    })

  })

})(jQuery);
