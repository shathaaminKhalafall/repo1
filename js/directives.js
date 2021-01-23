var Selectric = (function () {
    function Selectric($interpolate) {
        this.restrict = 'E';
        this.require = ['?select', '?ngModel'];
        this.link = function (scope, el, attr, model) {
            if (!model || model.length < 2) {
                return;
            }
            var select = el[0];

            el.selectric({
                optionsItemBuilder: function (itemData, element, index) {
                    itemData.text = $interpolate(itemData.text)(scope);
                    return itemData.text;
                }
            });

            scope.$watch(function () {
                console.log('watch called');
                return select.options.length;
            }, function (n, o) {
                console.log('refresh called');
                el.selectric('refresh');
            });

            scope.$on('$destroy', function () {
                el.selectric('destroy');
            });
        };
    }
    Selectric.instance = function () {
        var _this = this;
        return ['$interpolate', function ($interpolate) {
                return new _this($interpolate);
            }];
    };
    return Selectric;
})();   


angular.module('websiteApp')
.directive("owlCarousel", ['$timeout',function($timeout) {
    return {
        restrict: 'E',
        transclude: false,
        link: function (scope) {
            scope.initCarousel = function(element) {
               $timeout(function () {
                  // provide any default options you want
                    var defaultOptions = {
                    };
                    var customOptions = scope.$eval($(element).attr('data-options'));
                    // combine the two options objects
                    for(var key in customOptions) {
                        defaultOptions[key] = customOptions[key];
                    }
                    // init carousel
                    $(element).owlCarousel(defaultOptions);
               },50);
        };
        }
    };
}])
.directive('owlCarouselItem', [function() {
    return {
        restrict: 'A',
        transclude: false,
        link: function(scope, element) {
          // wait for the last item in the ng-repeat then call init
            if(scope.$last) {
                scope.initCarousel(element.parent());
            }
        }
    };
}])
.directive('pagination', function(){  
   return{
      restrict: 'E',
      template: '<div  class="row mt-5">'+
          '<div class="col text-center">'+
            '<div class="block-27">'+
              '<ul>'+
               '<button ng-disabled ="disabled1"><a ng-click="getTopics(CurrentPage-1)" >&lt;</a></button>'+
                '<button ng-repeat="x in [].constructor(rang) track by $index" ng-class="{active : CurrentPage == $index+1}" data-dt-idx="{{$index+1}}" ng-click="getTopics($index+1)"><span>{{$index+1}}</span></button>'
                +'<button ng-disabled ="disabled2"  ><a ng-click="getTopics(CurrentPage+1)" >&gt;</a></button>'+
              '</ul>'+
            '</div>'+
          '</div>'+
       '</div>'
   };
}).directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
            element.attr('src', e.target.result);

        }
    };
}]).directive('numbersOnly', function () {
    return {
        require: 'ngModel',
        link: function (scope, element, attr, ngModelCtrl) {
            function fromUser(text) {
                if (text) {
                    var transformedInput = text.replace(/[^0-9]/g, '');

                    if (transformedInput !== text) {
                        ngModelCtrl.$setViewValue(transformedInput);
                        ngModelCtrl.$render();
                    }
                    return transformedInput;
                }
                return undefined;
            }            
            ngModelCtrl.$parsers.push(fromUser);
        }
    };
}).directive('select', Selectric.instance())
.directive('schrollBottom', function () {
  return {
    scope: {
      schrollBottom: "="
    },
    link: function (scope, element) {
      scope.$watchCollection('schrollBottom', function (newValue) {
        if (newValue)
        {
          $(element).scrollTop($(element)[0].scrollHeight);
        }
      });
    }
  }
})
;
