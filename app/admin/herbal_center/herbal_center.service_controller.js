// blank controller
herbal_center.controller('HerbalCenterServiceController', HerbalCenterServiceController);

function HerbalCenterServiceController($scope, $http) {


    // var hospital_id = document.getElementsByName('hospital_id')[0].value;
    // console.log(hospital_id);

    
        $http
        .get(window.location.origin+"/service/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data;
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            data2=[];
            $('#subservice_id').kendoDropDownList({
                optionLabel   : "Select Sub-service",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data2,
                dataType: "jsonp",
                index: 0
            });

            // var dropdownlist = $("#service_id").data("kendoDropDownList");
            //     dropdownlist.value(selected_service);

        });


        $scope.getSubservice = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            console.log(value);

            $http
            .get(window.location.origin+"/service/sub-service/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log(data);
                $('#subservice_id').kendoDropDownList({
                    optionLabel   : "Select Sub-service",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        }

}