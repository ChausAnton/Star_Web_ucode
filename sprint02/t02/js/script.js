var animal_name = prompt("What animal is the superhero most similar to?");

if(/^[A-Z]{0,20}$/ig.test(animal_name) != false) {
    var gender = prompt("Is the superhero male or female? Leave blank if unknown or other.");
    if(/^male$/ig.test(gender) != false || /^female$/ig.test(gender) != false || /^$/ig.test(gender) != false ) {
        var age = prompt("How old is the superhero?");
        if(/^[0-9]{0,5}$/ig.test(age) != false && age[0] != "0") {
            var superhero_name = animal_name;

            if(age < 18) {
                if(/^male$/ig.test(gender) == true) {
                    superhero_name += "-" + "boy"
                }
                else if(/^female$/ig.test(gender) == true) {
                    superhero_name += "-" + "girl"
                }
                else if (/^$/ig.test(gender) == true) {
                    superhero_name += "-" + "kid"
                }
            }
            else if (age >= 18) {
                if(/^male$/ig.test(gender) == true) {
                    superhero_name += "-" + "man"
                }
                else if(/^female$/ig.test(gender) == true) {
                    superhero_name += "-" + "woman"
                }
                else if (/^$/ig.test(gender) == true) {
                    superhero_name += "-" + "hero"
                }
            }

            alert("The superhero name is: " + superhero_name)
        }
        else {
            alert("length <= 5, only digits, cannot star with zero");
        }
    }
    else {
        alert("accepts only male and female, or blank");
    }
}
else {
    alert("animal name must be: length <= 20, only one word that contains only letters");
}







