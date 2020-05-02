#### array_slice()

Dizi değerlerini parçalarken istediğiniz indistende başlamasını istersek
array_slice() fonksiyonunu kullanabiliriz.

        $a=array("red","green","blue","yellow","brown");
        print_r(array_slice($a,1));


Output: 

         Array ( [0] => green [1] => blue [2] => yellow [3] => brown )