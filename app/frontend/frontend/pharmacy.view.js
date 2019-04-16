// blank controller
frontend.controller('ViewPharmacyController', ViewPharmacyController);

function ViewPharmacyController($scope, $http , $sce) {
    
    $scope.trustAsHtml = $sce.trustAsHtml;

    var pharmacy_id = document.getElementsByName('pharmacy_id')[0].value;

     $http
        .get(window.location.origin+"/service/api/view/pharmacy/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        
        .then(function(response){
            
            data = response.data.pharmacyservice;
            
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            var dropdownlist = $("#service_id").data("kendoDropDownList");

        });

    
     $http
        .get(window.location.origin+"/product-category/api/view/pharmacy/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.pharmacyproductcategory;
            $('#product_category_id').kendoDropDownList({
                optionLabel   : "Select Product Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            var dropdownlist = $("#product_category_id").data("kendoDropDownList");

        });

        

        $scope.getproductSubCategoryDropDown = function() 
        {
            $('#product_subcategory_id').kendoDropDownList({
             optionLabel   : "Select Product Subcategory",
            });
        };



        $scope.getSubProductCategory = function() 
        {
            var value = $("#product_category_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/product-category/product-subcategory/api/view/pharmacy/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacyproductsubcategory;
                $('#product_subcategory_id').kendoDropDownList({
                    optionLabel   : "Select Product Subcategory",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };
        
        $scope.getServiceDropDown = function() 
        {
            $('#service_id').kendoDropDownList({
             optionLabel   : "Select Service",
            });
        };
        
        
        /*$scope.getSubservice = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
           
            $http
            .get(window.location.origin+"/service/sub-service/api/view/pharmacy/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacysubservice;
                $('#service_id').kendoDropDownList({
                    optionLabel   : "Select Subservice",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };*/
        
        $scope.getPharmacyService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            $http
            .get(window.location.origin+"/pharmacy/pharmacy-service/api/list/" + pharmacy_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };    
        

        $scope.getPharmacyProduct = function() 
        {
            var value = $("#product_subcategory_id").data("kendoDropDownList").value();
            console.log(value);
            $http
            .get(window.location.origin+"/pharmacy/pharmacy-product/api/list/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.products = response.data;
            });
    
        };


        $http
        .get(window.location.origin+"/medical-department/api/view/pharmacy/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.pharmacydepartment;
            $('#department_id').kendoDropDownList({
                optionLabel   : "Select Department",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            var dropdownlist = $("#department_id").data("kendoDropDownList");

        });

        $scope.getMedicalSpecialistDropDown = function() 
        {
            
            $('#medical_specialist_id').kendoDropDownList({
             optionLabel   : "Select Doctor",
            });
        };

        $scope.getMedicalSpecialist = function() 
        {
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/view/pharmacy/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacymedicalspecialist;
                $('#medical_specialist_id').kendoDropDownList({
                    optionLabel   : "Select Doctor",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };

        //$scope.trustAsHtml = $sce.trustAsHtml;

        $scope.getDoctor = function() 
        {
            var value = $("#medical_specialist_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/pharmacy/pharmacy-doctor/api/list/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });


    
        };

        
}