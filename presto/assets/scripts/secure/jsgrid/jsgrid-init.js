$(function() {

    function applyFilter(obj) {

        var set = false;

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };

        $.each( obj, function( key, value ) {

            if(key != 'pageIndex' && key != 'pageSize' && value != ''){
                set = true;
            }

        });

        if( set == false ) {
            var Status = getUrlParameter('status');

            if (Status != null) {
                obj['Status'] = Status;
                return obj;
            }

        }

        return obj;

    };

    $("#tagzGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageButtonCount: 5,
        rowClick: function(args) {
            window.location.replace("/rt/tagz/view/" + args.item.Tag + "/");
        },
        controller: {
            loadData: function(filter) {
                var d = $.Deferred();
                filter = applyFilter(filter);
                $.ajax({
                    type: "GET",
                    url: "/rt/data/tagz/",
                    dataType: "JSON",
                    data: filter
                }).done(function(response) {
                    d.resolve( { data: response.result, itemsCount: response.itemsCount } );
                });
                return d.promise();
            }
        },
        fields: [
            { name: "Tag", type: "text" },
            { name: "Status", type: "select",
                items: [
                    { Name: "" },
                    { Name: "Inactive", Id: "0" },
                    { Name: "Activated", Id: "1" },
                    { Name: "Found", Id: "9" },
                ],
                valueField: "Id",
                textField: "Name",
                width: 60
            },
            { name: "Created", type: "text"},
            { name: "Activated", type: "text"}
        ]
    });

    $("#tagzCollectionGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageButtonCount: 5,
        rowClick: function(args) {
            window.location.replace("/rt/finders/view/" + args.item.ID + "/");
        },
        controller: {
            loadData: function(filter) {
                var d = $.Deferred();

                $.ajax({
                    type: "GET",
                    url: "/rt/data/tagzCollection/",
                    dataType: "JSON",
                    data: filter
                }).done(function(response) {
                    d.resolve( { data: response.result, itemsCount: response.itemsCount } );
                });
                return d.promise();
            }
        },
        fields: [
            { name: "Tag", type: "text" },
            { name: "First Name", type: "text" },
            { name: "Last Name", type: "text" },
            { name: "Postcode", type: "text" }
        ]
    });

    $("#tagzTopayGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageButtonCount: 5,
        rowClick: function(args) {
            window.location.replace("/rt/finders/view/" + args.item.ID + "/");
        },
        controller: {
            loadData: function(filter) {
                var d = $.Deferred();

                $.ajax({
                    type: "GET",
                    url: "/rt/data/tagzTopay/",
                    dataType: "JSON",
                    data: filter
                }).done(function(response) {
                    d.resolve( { data: response.result, itemsCount: response.itemsCount } );
                });
                return d.promise();
            }
        },
        fields: [
            { name: "Tag", type: "text" },
            { name: "First Name", type: "text" },
            { name: "Last Name", type: "text" },
            { name: "Postcode", type: "text" }
        ]
    });

    $("#tagzNotReturnedGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageButtonCount: 5,
        rowClick: function(args) {
            window.location.replace("/rt/finders/view/" + args.item.ID + "/");
        },
        controller: {
            loadData: function(filter) {
                var d = $.Deferred();

                $.ajax({
                    type: "GET",
                    url: "/rt/data/tagzNotReturned/",
                    dataType: "JSON",
                    data: filter
                }).done(function(response) {
                    d.resolve( { data: response.result, itemsCount: response.itemsCount } );
                });
                return d.promise();
            }
        },
        fields: [
            { name: "Tag", type: "text" },
            { name: "First Name", type: "text" },
            { name: "Last Name", type: "text" },
            { name: "Postcode", type: "text" }
        ]
    });

    $("#ownersGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageButtonCount: 5,
        rowClick: function(args) {
            window.location.replace("/rt/owners/view/" + args.item.ID + "/");
        },
        controller: {
            loadData: function(filter) {
                var d = $.Deferred();

                $.ajax({
                    type: "GET",
                    url: "/rt/data/owners/",
                    dataType: "JSON",
                    data: filter
                }).done(function(response) {
                    d.resolve( { data: response.result, itemsCount: response.itemsCount } );
                });
                return d.promise();
            }
        },
        fields: [
            { name: "First Name", type: "text" },
            { name: "Last Name", type: "text" },
            { name: "Email Address", type: "text"},
            { name: "Phone Number", type: "text"},
            { name: "Postcode", type: "text"}
        ]
    });

   $("#assetsGrid").jsGrid({
        height: "auto",
        width: "100%",
        filtering: true,
        editing: false,
        inserting: false,
        sorting: true,
        paging: true,
        autoload: true,
        pageLoading: true,
        pageSize: 10,
        pageButtonCount: 5,
        rowClick: function(args) {
            window.location.replace("/rt/secure/asset/view/" + args.item.ID + "/");
        },
        controller: {
            loadData: function(filter) {
                var d = $.Deferred();

                $.ajax({
                    type: "GET",
                    url: "/rt/data/assets/",
                    dataType: "JSON",
                    data: filter
                }).done(function(response) {
                    d.resolve( { data: response.result, itemsCount: response.itemsCount } );
                });
                return d.promise();
            }
        },
        fields: [
            { name: "Tag", type: "text" },
            { name: "Status", type: "text" },
            { name: "Created", type: "text"},
            { name: "Activated", type: "text"}
        ]
    });

});