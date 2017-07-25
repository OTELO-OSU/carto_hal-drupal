<div ng-app="cartoHal">
        <script type="text/javascript">
        /* var ConfigWidgetHal={
            ApiURL:"{{ApiUrl}}",
            DisplayMap:"{{DisplayMap}}",
            DisplayDatatable:"{{DisplayTable}}",
	    DocumentType:"{{document_types}}",
            query:"{{CollectionName}}"
          }*/
  var ConfigWidgetHal={
            ApiURL:"http://api.archives-ouvertes.fr",
            DisplayMap:true,
            DisplayDatatable:true,
            ResultSize:10000,
            query:$ApiURL
          }

        </script>       
    <search></search>
</div>
