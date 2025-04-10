X <- runif(1)

# Vérifier les intervalles et assigner la valeur du dé
if ((X >= 0) & (X <= 1/6)) {
  resultat <- 1
} else if ((X > 1/6) & (X <= 2/6)) {
  resultat <- 2
} else if ((X > 2/6) & (X <= 3/6)) {
  resultat <- 3
} else if ((X > 3/6) & (X <= 4/6)) {
  resultat <- 4
} else if ((X > 4/6) & (X <= 5/6)) {
  resultat <- 5
} else {
  resultat <- 6
}

# Afficher le résultat du lancer de dé
print(resultat)

