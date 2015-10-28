			<?php
				session_start();
				$titre = "Règles du jeu";
				require_once('../../Layouts/menu.php');
			?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 formAjoutCarte">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1 class="text-center">Règles du jeu</h1><br/>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" role="tablist">
							<li class="active"><a data-toggle="tab" href="#introduction">Introduction</a></li>
							<li><a data-toggle="tab" href="#cartes">Cartes</a></li>
							<li><a data-toggle="tab" href="#firstGame">Première partie</a></li>
							<li><a data-toggle="tab" href="#phasesTour">Phases</a></li>
							<li><a data-toggle="tab" href="#titresMulti">Titres multijoueurs</a></li>
							<li><a data-toggle="tab" href="#autresConcepts">Autres concepts</a></li>
							<li><a data-toggle="tab" href="#motsCles">Mots-clés</a></li>
							<li><a data-toggle="tab" href="#reglesAvancees">Règles avancées</a></li>
							<li><a data-toggle="tab" href="#variantesJeu">Variantes</a></li>
							<li><a data-toggle="tab" href="#credits">Crédits</a></li>
						</ul>
						<div id="my-tab-content" class="tab-content">
							<div class="tab-pane active" id="introduction">
								<h2>Introduction</h2>
								<p class="text-justify">
									Basé sur la saga épique éponyme de George R. R. Martin, le &laquo; Tr&ocirc;ne de Fer &raquo; est un jeu de
									cartes où se mêlent conqu&ecirc;te, batailles, inrtigues et tra&icirc;trises. Chaque joueur représente l'une
									des six Grandes Maisons en lice pour contrôler le Tr&ocirc;ne de Fer et prendre le pouvoir sur le continent
									de Westeros.
								</p>
								<p class="text-justify">
									Le pouvoir s'obtient en remportant des défis contre les Maisons de vos adversaires. Il existe trois types de
									défis :	militaire (<img src="http://www.agotcards.org/images/icons/ico_military.png" alt="icone_militaire"/>),
											intrigue (<img src="http://www.agotcards.org/images/icons/ico_intrigue.png" alt="icone_intrigue"/>) et
											pouvoir (<img src="http://www.agotcards.org/images/icons/ico_power.png" alt="icone_pouvoir"/>).
								</p>
								<p class="text-justify">
									Le premier joueur à atteindre 15 points de Pouvoir remporte la partie.
								</p>
									<h3>Le jeu de cartes évolutif / &quot;Living Card Game&quot;</h3>
										<p class="text-justify">
											La bo&icirc;te de base du Tr&ocirc;ne de Fer jeu de cartes est un jeu complet pour quatre joueurs. Mais
											le Tr&ocirc;ne de Fer est aussi un Jeu de Cartes Evolutif (JCE) (Living Card Game ou LCG) personnalisable
											et extensible à l'aide des parutions régulières de paquets-chapitres de quarante ou soixante cartes
											inédites. Chaque chapitre offre de nouvelles options pour les decks de cette bo&icirc;te et des cartes
											pour construire vos propres decks.
										</p>
									<h3>Contenu</h3>
										<p class="text-justify">
											Votre bo&icirc;te de base du Trône de Fer jeu de cartes doit contenir :
											<ul>
												<li>1 livre de règles</li>
												<li>220 cartes, divisées en 4 decks (deck Stark, deck Lannister, deck Baratheon et deck Targaryen)</li>
												<li>1 plateau de jeu</li>
												<li>60 compteurs de pouvoir</li>
												<li>44 jetons de pièce d'or</li>
												<li>6 figurines de Titres</li>
											</ul>
										</p>
										<h4>Les cartes</h4>
											<p class="text-justify">
												La boîte de base du Trône de Fer jeu de cartes contient 220 cartes divisées en quatre différents decks
												prêts-à-jouer : un de la Maison Stark, un de la Maison Lannister, un de la Maison Baratheon et un de
												la Maison Targaryen. Les cartes Maison des deux autres Maisons royales (Greyjoy et Martell) sont
												incluses également, ainsi que les six cartes références des titres.
											</p>
											<img src="../../webroot/media/images/regles/intro_cartes.png"/>
										<h4>Le plateau de jeu</h4>
											<p class="text-justify">
												Le plateau comporte trois zones : la Salle du Trône, la Réserve d'or et la Chambre du Conseil
												restreint. Pendant la partie, les marqueurs de pouvoirs sont pris dans la Salle du Trône, les pièces
												d'or (ou or) de la Réserve d'or et les figurines multijoueurs sont sélectionnées à partir du Conseil
												restreint.
											</p>
											<img src="../../webroot/media/images/regles/intro_plateau.png"/>
										<h4>Jetons de pouvoir</h4>
											<p class="text-justify">
												Les joueurs placent des jetons de pouvoir sur leur carte Maison, leurs personnages et leurs lieux
												quand ils prennent du pouvoir au cours du jeu. Le premier joueur à 15 a gagné.
											</p>
											<img src="../../webroot/media/images/regles/intro_jetons.png"/>
										<h4>Pièces d'or</h4>
											<p class="text-justify">
												Les pièces d'or sont utilisées pour compter l'or des joueurs tout au long de la partie. L'or est
												utilisé pour jouer certaines cartes, pour payer des effets et pour alimenter certaines capacités de
												cartes.
											</p>
											<img src="../../webroot/media/images/regles/intro_pieces.png"/>
										<h4>Figurines de titre</h4>
											<p class="text-justify">
												Chacune de ces figurines représente un titre (ou rôle) du monde de Westeros que les joueurs utilisent
												dans certains moments du jeu. Un titre est sélectionné du Conseil restreint et placé sur ou proche de
												la carte Maison du joueur pour montrer que ce joueur a choisi ce titre.
											</p>
											<img src="../../webroot/media/images/regles/intro_titres.png"/>
									<h3>Les six Maisons royales</h3>
										<p class="text-justify">
											<ul class="list-unstyled">
												<li><img src="../../webroot/media/images/regles/flag_baratheon.png"/>Maison Baratheon</li>
												<li><img src="../../webroot/media/images/regles/flag_lannister.png"/>Maison Lannister<li>
												<li><img src="../../webroot/media/images/regles/flag_stark.png"/>Maison Stark</li>
												<li><img src="../../webroot/media/images/regles/flag_targaryen.png"/>Maison Targaryen</li>
												<li><img src="../../webroot/media/images/regles/flag_greyjoy.png"/>Maison Greyjoy</li>
												<li><img src="../../webroot/media/images/regles/flag_martell.png"/>Maison Martell</li>
											</ul>
										</p>
							</div>
							<div class="tab-pane" id="cartes">
								<h2>Description des cartes (hors cartes Maison)</h2>
								<p class="text-justify">
									<dl>
										<dt>1. Coût</dt>
										<dd>Le montant d'Or que vous devez dépenser de votre trésor pour jouer cette carte.
										<dt>2. Armoiries de Maison</dt>
										<dd>Indiquent à quelle Maison cette carte est affiliée. La couleur du fond l'indique également. Les
											cartes neutres n'ont pas d'armoiries.
										<dt>3. Titre</dt>
										<dd>Le nom de cette carte. Une bannière
											(<img src="http://www.agotcards.org/images/flag_small.gif" alt="icone_banniere"/>) à côté de son
											titre signifie qu'elle est unique.</dd>
										<dt>4. Force (FOR)</dt>
										<dd>L'efficacité de votre personnage durant les défis.</dd>
										<dt>5. Icônes de défis</dt>
										<dd>Indiquent dans quel(s) défi(s) peut s'engager le personnage, en attaque ou en défense.<br/>
											<img src="http://www.agotcards.org/images/icons/ico_military.png" alt="icone_militaire"/> <strong>
											Défi militaire (hache)</strong><br/>
											<img src="http://www.agotcards.org/images/icons/ico_intrigue.png" alt="icone_intrigue"/> <strong>
											Défi d'intrigue (&oelig;il)</strong><br/>
											<img src="http://www.agotcards.org/images/icons/ico_power.png" alt="icone_pouvoir"/> <strong>
											Défi de pouvoir (couronne)</strong><br/></dd>
										<dt>6. Traits</dt>
										<dd>Désignation qui n'influence pas les règles du jeu, mais qui peut être affectée par d'autres
											cartes. Exemples : <strong><em>Lord</em></strong>, <strong><em>Lady</em></strong>, <strong><em>
											Chevalier</em></strong>, <strong><em>Mestre</em></strong>, <strong><em>Maison Tully</em></strong>.
										<dt>7. Boîte de texte</dt>
										<dd>Capacités de cette carte.</dd>
										<dt>8. Vertus</dt>
										<dd>Identifiant visuel qui n'influence pas les règles mais qui peut être affecté par d'autres cartes.
											Les quatre Vertus sont :</br>
											<ul class="list-inline">
												<li><img src="http://www.agotcards.org/images/icons/ico_holy.png" alt="vertu_beni"/> Mystique</li>
												<li><img src="http://www.agotcards.org/images/icons/ico_learned.png" alt="vertu_lettre"/> Lettré</li>
												<li><img src="http://www.agotcards.org/images/icons/ico_noble.png" alt="vertu_noble"/> Noble</li>
												<li><img src="http://www.agotcards.org/images/icons/ico_war.png" alt="vertu_guerrier"/> Guerrier</li>
											</ul></dd>
										<dt>9. Revenu</dt>
										<dd>Le montant d'Or que fournit votre carte complot ce tour-ci.</dd>
										<dt>10. Initiative</dt>
										<dd>Détermine, parmi les joueurs, lequel pourra choisir qui agira en premier ce tour-ci.</dd>
										<dt>11. Valeur de prise</dt>
										<dd>Les dégâts que vous infligez quand vous remportez un défi en attaque.</dd>
										<dt>12. Symbole d'extension et numéro de collection</dt>
										<dd> Chaque carte <abbr title="Trône de Fer">TdF</abbr> a un symbole l'identifiant à une extension,
											ainsi qu'un nombre unique qui la démarque des autres cartes de cette extension.</dd>
									</dl>
								</p>
								<h2>Types de cartes</h2>
								<p class="text-justify">
									Il y a huit types de cartes dans le Trône de Fer : personnages, lieux, attachements, évènements, complots, cartes
									Maison, agendas et titres multijoueurs.
								</p>
									<h3>Cartes Maison</h3>
										<p class="text-justify">
											Chaque joueur choisit d'incarner l'une des six Maisons royales et ce choix est représenté par la carte Maison
											appropriée. Les cartes affiliées à une Maison auront les mêmes armoiries et la même couleur de fond (les
											cartes sans armoiries et avec une couleur de fond grise sont des <strong>cartes neutres</strong>, elles
											n'appartiennent à aucune Maison).
										</p>
									<h3>Personnages</h3>
										<p class="text-justify">
											Les personnages participent aux défis contre les autres Maisons, en attaquant ou en défendant. Les
											personnages sont faciles à distinguer : ce sont les seules cartes avec une valeur de Force (FOR).
										</p>
									<h3>Lieux</h3>
										<p class="text-justify">
											Quand ils sont en jeu, les lieux apportent des bénéfices pour votre Maison, comme leur boîte de texte
											l'indique. Certains fournissent des revenus (représentés dans une grosse pièce d'or), certains réduisent
											le coût pour jouer des cartes, d'autres ont des capacités qui peuvent être déclenchées, etc. Les lieux
											forment la colonne vertébrale de votre surface de jeu et ne participent pas aux défis !
										</p>
									<h3>Attachements</h3>
										<p class="text-justify">
											Les attachements sont joués <strong>sous</strong> une autre carte (une des vôtres ou de votre adversaire)
											déjà en jeu et la modifient avec leur texte (la plupart des attachements sont joués sur des personnages,
											mais certains sont joués sur d'autres types de cartes). Les attachements sont défaussés si, pour quelque
											raison que ce soit, la carte à laquelle ils sont attachés quitte le jeu (par exemple si elle est tuée,
											défaussée, revenue dans votre main ou dans votre deck).
										</p>
									<h3>Evènements</h3>
										<p class="text-justify">
											Les cartes évènements sont jouées de votre main pour tenter d'appliquer les effets qu'elles indiquent. Une
											fois jouée, et une fois l'effet résolu, mettez la carte dans la pile de défausse. Même s'il y a beaucoup
											d'évènements dont le texte se réfère à une maison spécifique, les évènements sont toujours neutres. On
											reconnaît les cartes évènements grâce aux motifs d'oiseaux qui figurent sur leur côté gauche.
										</p>
										
									<h3>Complots</h3>
										<p class="text-justify">
											Ces cartes sont placées de manière à former un paquet séparé (votre pile de complots) et représentent
											votre stratégie à court terme. Au début de chaque tour, vous choisissez une carte de votre pile de
											complots que vous utiliserez pour ce tour.
										</p>
									<h3>Agendas</h3>
										<p class="text-justify">
											Les cartes agendas modifient de façon permanente votre carte Maison et donnent accès à des capacités
											spéciales. Avant le début de la partie, vous pouvez choisir un (et un seul) agenda et le placer sous votre
											carte Maison pour bénéficier des avantages et des inconvénients qu'il induit, et ceci pour toute la durée
											de la partie. Les agendas ne peuvent pas être retirés par un effet de carte et ne sont pas considérées
											comme étant en jeu. De telles cartes ne sont pas dans la boîte de base.
										</p>
									<h3>Cartes de référence des Titres</h3>
										<p class="text-justify">
											Ces cartes peuvent être utilisées comme référence pour les capacités des six titres du jeu. Elles sont
											distinguables des autres grâce à leurs dos rouges, au lieu du bleu foncé standard.
										</p>
								<h2>Symboles spéciaux dans les bo&icirc;tes de texte des cartes</h2>
									<h3>Bonus et pénalités de revenu</h3>
										<p class="text-justify">
											Certaines cartes (essentiellement des lieux) comportent une grande pièce d'or marquée d'une valeur de +X
											ou -X dans leur boîte de texte. Ces cartes modifient votre revenu total, même lorsqu'elles sont inclinées.
										</p>
									<h3>Bonus d'initiative</h3>
										<p class="text-justify">
											Certaines cartes ont un grand losange cuivré marqué d'une valeur +X dans leur boîte de texte. Ces cartes
											modifient la valeur d'initiative de votre carte complot révélée, même quand elles sont inclinées. Votre
											total 'initiative est la somme de l'initiative de votre carte complot révélée et de tous les bonus
											d'initiative des cartes que vous contrôlez.
										</p>
									<h3>Influence</h3>
										<p class="text-justify">
											L'influence est une ressource spéciale fournie par certains lieux et personnages. La quantité d'influence
											fournie est indiquée par un chiffre dans une icône de parchemin à l'intérieur de la boîte de texte de ces
											cartes. Par exemple, un personnage qui procure 2 d'influence a le chiffre 2 dans son parchemin.
										</p>
										<p class="text-justify">
											Quand un évènement ou une capacité vous demande d'incliner une certaine quantité d'influence, vous devez
											incliner un nombre de personnages ou de lieux qui produisent au moins autant d'influence. Sinon, vous ne
											pouvez pas déclencher l'effet souhaité. Tout surplus d'influence est perdu ; ainsi il n'est pas possible
											d'&laquo; économiser &raquo; de l'influence qui aurait été payée en trop.
										</p>
							</div>
							<div class="tab-pane" id="firstGame">
								<h2>Votre première partie</h2>
								<p class="text-justify">
									La première fois que vous jouerez au jeu de base du Trône de Fer, vous devrez trouver trois adversaires. Chaque
									joueur devra choisir sa famille : soit le deck Stark, le deck Lannister, le Baratheon ou le Targaryen. Toutes les
									cartes du deck Stark ont un &quot;S&quot; devant leur numéro de collection, les Lannister ont un &quot;L&quot;,
									etc.
								</p>
								<p class="text-justify">
									Suivez ensuite les instructions ci-dessous :
									<ol>
										<li>Donnez un deck à chaque joueur.</li>
										<li>Cherchez votre carte Maison.</li>
										<li>Séparez les sept cartes complot de votre deck. Ils formeront votre pile de complots.</li>
										<li>Retirez les cartes Maison non utilisées et les cartes Titres multijoueurs de votre deck. Les cartes Maison
											Greyjoy et Martell ne seront pas utilisées avec la boîte de base. Les cartes Titres multijoueurs sont des
											cartes de référence uniquement, elles ne feront pas partie de votre deck.</li>
									</ol>
								</p>
								<p class="text-justify">
									A la fin de ce processus, vous devez avoir un deck Maison (constitué d'évènements, de lieux, de personnages et
									d'attachements) et une pile de complots (constituée d'exactement sept complots).
								</p>
									<h3>Préparation du jeu</h3>
										<h4>1. Disposez le plateau de jeu</h4>
											<p class="text-justify">
												Placez le plateau au centre de la surface de jeu. Placez au moins 15 jetons de pouvoir par joueur sur
												la Salle du Trône. C'est le pouvoir que pourront prendre vos personnages et vos cartes Maison durant
												la partie. Ensuite, placez au moins 10 pièces d'Or par joueur dans la Réserve d'or. Chaque joueur
												recevra à sa phase de recrutement de l'or de cette Réserve, qu'il utilisera pour jouer des cartes de
												sa main, alimenter des capacités ou payer des effets de carte. Si la Salle du Trône manque de pouvoir,
												ou que la Réserve manque d'or au cours du jeu, rajoutez-en simplement. Finalement, placez les
												figurines de Titres multijoueurs sur le Conseil restreint. Ces figurines représentent les titres que
												les joueurs s'attribueront à chaque tour.
											</p>
										<h4>2. Séparez votre deck et votre pile de complots</h4>
											<p class="text-justify">
												Personnages, lieux, attachements et évènements vont dans votre deck Maison. Votre pile de complots
												doit contenir 7 cartes complot différentes.
											</p>
										<h4>3. Déclarez votre Maison et votre agenda</h4>
											<p class="text-justify">
												Déterminez au hasard qui sera le premier joueur. Chaque joueur annonce quelle carte Maison et quel
												agenda (s'il en a un)) il utilisera pour cette partie. Notez que plusieurs joueurs peuvent jouer les
												mêmes Maison et agenda.
											</p>
										<h4>4. Mélangez votre deck</h4>
										<h4>5. Piochez votre main de mise en place</h4>
											<p class="text-justify">Piochez 7 cartes de votre deck.</p>
										<h4>6. Mise en place</h4>
											<p class="text-justify">
												Placez devant vous, <strong>face cachée</strong>, des cartes personnage et / ou lieu de votre main,
												pour un montant total de 5 Or. Vous pouvez placer seulement 1 carte <strong>limitée</strong> pendant
												cette phase et vous ne pouvez pas placer un <strong>doublon</strong> d'une carte unique. Toute carte
												que vous jouez et qui n'est pas rattachée à votre Maison coûte 2 Or de plus (c'est une
												<strong>pénalité d'Or</strong>, voir plus loin). Une fois que tous les joueurs ont joué leurs cartes
												de mise en place, les cartes sont révélées simultanément.
											</p>
											<p class="text-justify">
												<strong>Note :</strong> les cartes révélées pendant la mise en place ne sont pas considérées
												&quot;jouées&quot; ou &quot;entrées en jeu&quot;. Les effets de cartes déclenchés lorsqu'elles entrent
												en jeu ne sont donc pas déclenchés à la mise en place.
											</p>
										<h4>7. Piochez votre main de départ</h4>
											<p class="text-justify">Piochez à nouveau jusqu'à compléter votre main à 7 cartes.</p>
											<p class="text-justify">Le jeu peut commencer.</p>
									<h3>Disposition recommandée<small> de la surface de jeu</small></h3>
							</div>
							<div class="tab-pane" id="phasesTour">
								<h2>Phases du tour de jeu</h2>
								<p class="text-justify">
									Le jeu se joue en plusieurs tours qui sont chacun divisés en sept phases. La plupart des phases sont jouées
									simultanément par les joueurs, à l'exception des phases de recrutement et de défis. Durant ces deux phases, le
									premier joueur agit en premier, suivit par les autres dans le sens des aiguilles d'une montre.
								</p>
								<p class="text-justify">
									Les 7 phases sont, dans l'ordre :
									<strong><ol>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#complot">Complot</a></li>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#pioche">Pioche</a></li>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#recrutement">Recrutement</a></li>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#defis">Défis</a></li>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#hegemonie">Hégémonie</a></li>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#redressement">Redressement</a></li>
										<li><a href="http://www.letronedeferjce.com/php/frontend/regles.php#impot">Impôt</a></li>
									</ol></strong>
								</p>
									<a name="complot"></a> <!-- ancre Phase 1 -->
									<h3>Phase 1 : Complot</h3>
										<p class="text-justify">
											La phase de Complot comprend deux étapes :
											<strong><ol>
												<li>Choisissez et révélez les complots</li>
												<li>Choisissez les Titres</li>
											</ol></strong>
										</p>
										<h4>Phase de complots, étape 1 : choisissez et révélez les complots</h4>
											<p class="text-justify">
												Les joueurs <strong>choisissent</strong> et révèlent simultanément une carte de leur pile de complots.
												Il y a 3 états possibles pour une carte complot : inutilisée, révélée et utilisée. Au moment où vous
												la révélez, une carte passe de l'état inutilisé à celui de révélé. A la fin de la phase d'impôts,
												votre carte complot révélée rejoint votre pile de complots utilisés. S'il s'agissait de votre dernier
												complot, tous vos complots utilisés redeviennent inutilisés (sauf le dernier que vous avez révélé).
												Ensuite, le joueur ayant le plus haut total d'initiative (la somme de l'initiative de la carte complot
												et des éventuels bonus d'initiative des cartes qu'il contrôle) gagne l'initiative. En cas d'égalité,
												le joueur ex &aelig;quo qui a le moins de points de pouvoir (Maison + personnages) gagne l'initiative.
												S'il y a encore une égalité, l'initiative est tirée au hasard.
											</p>
											<p class="text-justify">
												Le joueur qui gagne l'initiative choisit qui des joueurs agira le premier durant les phases de ce tour.
												Le joueur choisi devient le <strong>Premier Joueur</strong>.
											</p>
											<p class="text-justify">
												Le tour commence toujours par le premier joueur, puis continue dans le sens des aiguilles d'une montre.
												Quand plusieurs effets passifs arrivent simultanément, c'est le premier joueur qui détermine l'ordre
												dans lequel ils doivent être résolus.
											</p>
										<h4>Phase de complots, étape 2 : choisissez les Titres</h4>
											<p class="text-justify">
												Le Premier Joueur choisit l'un des titres de la Chambre du Conseil restreint, qu'il utilisera pour ce
												tour, et place la figurine correspondante sur ou près de sa carte Maison. En continuant dans le sens
												des aiguilles d'une montre, chaque joueur choisit un titre parmi les titres restants. Les titres non
												choisis ne sont pas utilisés ce tour.
											</p>
											<p class="text-justify">
												Les titres donnent des avantages uniques et créent des relations entre les joueurs. Ils ne sont pas
												considérés en jeu et leurs effets ne peuvent pas être annulés. Leurs effets sont détaillés plus loin.
											</p>
									<a name="pioche"></a> <!-- ancre Phase 2 -->
									<h3>Phase 2 : Pioche</h3>
										<p class="text-justify">
											Les joueurs piochent 2 cartes de leur deck et les ajoutent à leur main. Si vous n'avez plus de cartes dans
											votre deck, vous ne piochez pas.
										</p>
									<a name="recrutement"></a> <!-- ancre Phase 3 -->
									<h3>Phase 3 : Recrutement</h3>
										<p class="text-justify">
											Le Premier Joueur accomplit sa phase de recrutement en premier, suivi par les autres joueurs, dans le sens
											des aiguilles d'une montre. Le joueur dont c'est actuellement le tour de jouer est appelé Joueur Actif.
											Les joueurs recrutent tour à tour, mais il est toujours possible de jouer des actions
											&quot;<strong>Recrutement :</strong>&quot; ou &quot;<strong>N'importe quelle Phase :</strong>&quot;, même
											pendant le recrutement d'un autre joueur.
										</p>
										<p class="text-justify">
											Quand vous recrutez, commencez par <strong>déterminer vos revenus</strong> en comptant ceux indiqués sur
											votre carte complot de ce tour, ainsi que les divers bonus que vous procurent les cartes en jeu sous votre
											contrôle, et prenez autant de jetons or de la réserve que votre total de revenus.
										</p>
										<p class="text-justify">
											Notez qu'une carte qui ajoute du revenu et que vous jouez pendant la phase de recrutement <strong>ne
											s'ajoute pas à votre revenu avant votre prochaine phase de recrutement</strong>.
										</p>
										<p class="text-justify">
											Vous pouvez maintenant jouer des cartes de votre main en payant leur prix à la Réserve d'or depuis votre
											Trésor. Vous pouvez à tout moment décider de terminer votre phase de recrutement. Il n'est d'ailleurs pas
											nécessaire de dépenser tout votre or puisqu'il pourra aussi servir pour déclencher certains effets de
											carte par la suite. Par contre, vous ne pouvez jouer des cartes de votre main en en payant le coût que
											pendant votre propre phase de recrutement.
										</p>
										<p class="text-justify">
											Vous pouvez également attacher des doublons à vos cartes uniques gratuitement (voir les explications sur
											les doublons).
										</p>
										<p class="text-justify">
											Si vous désirez jouer un personnage, un lieu ou un attachement affilié à <strong>une autre maison</strong>,
											le prix à payer pour cette carte est augmenté de 2. Cette pénalité est appelée &laquo; <strong>pénalité
											d'or</strong> &raquo;. Vous ne payez aucune pénalité d'or quand vous jouez des cartes neutres. Après qu'un
											joueur ait complété sa phase de recrutement, les adversaires, dans l'ordre des aiguilles d'une montre,
											peuvent accomplir leur phase de recrutement, les uns après les autres. Une fois que tous les joueurs ont
											terminé leur phase de recrutement, passez à la phase de défis.
										</p>
										<p class="text-justify">
											<em>Note : quand une carte est &laquo; mise en jeu &raquo; par un effet, elle évite toutes les
											restrictions, y compris les coûts ou pénalités d'or.</em>
										</p>
										<p class="text-justify">
											<em><strong>Exemple de recrutement :</strong> Damien, qui joue la maison Stark, est le Premier Joueur et
											commence sa phase de recrutement. Sa carte complot révélée procure 4 or et il contrôle 4 lieux, qui
											procurent un bonus de revenu combiné de +4. Son revenu total pour ce tour est donc de 8 pièces d'or, qu'il
											prend dans la Réserve d'or et place dans son Trésor.</em>
										</p>
										<p class="text-justify">
											<em>Il choisit de jouer Eddard Stark (Maison Stark, coût 4) et rend 4 pièces d'or de son Trésor à la
											Réserve d'or. Ensuite, Damien joue Jon Snow (neutre, coût 3) et déplace 3 pièces d'or de son trésor à la
											Résever d'or.</em>
										</p>
										<p class="text-justify">
											<em>Damien a encore 1 or à dépenser, mais comme il n'a pas de carte coûtant 1 or, il termine sa phase de
											recrutement. L'or restant dans son trésor y reste jusqu'à ce qu'il soit dépensé pour payer un effet, pris
											par un effet d'un autre joueur, ou retourné à la Réserve d'or à la phase d'impôt.</em>
										</p>
										<h4>Incliner et redresser</h4>
											<p class="text-justify">
												Quand vous mettez des cartes en jeu, elles sont placées, face visible, sur la surface de jeu, devant
												vous. C'est la position <strong>redressée</strong>. Lorqu'une carte est &laquo; utilisée &raquo; pour
												les défis ou pour l'activation de capacités, elle est tournée de 90&deg; ; cela indique que la carte
												est &laquo; utilisée &raquo;. C'est la position <strong>inclinée</strong>. Seules les cartes en
												position redressée peuvent être utilisées pour une action qui requiert l'inclinaison. Vous ne pouvez
												pas, par exemple, lancer un défi avec un personnage déjà incliné.
											</p>
									<a name="defis"></a> <!-- ancre Phase 4 -->
									<h3>Phase 4 : Défis</h3>
										<p class="text-justify">
											Les défis sont les trois types de conflits entre votre Maison et celles de vos adversaires. Chaque type de
											défi suit les mêmes règles générales avec, pour issue, une différence de résultat entre chacun.
											<ul class="list-unstyled">
												<li>
													Le but d'un <strong>défi militaire
													(<img src="http://www.agotcards.org/images/icons/ico_military.png" alt="icone_militaire"/>)</strong>
													est de forcer un adversaire à tuer ses personnages en jeu.
												</li>
												<li>
													Le but d'un <strong>défi d'intrigue
													(<img src="http://www.agotcards.org/images/icons/ico_intrigue.png" alt="icone_intrigue"/>)</strong>
													est de forcer un adversaire à se défausser au hasard de cartes qu'il a en main.
												</li>
												<li>
													Le but d'un <strong>défi de pouvoir
													(<img src="http://www.agotcards.org/images/icons/ico_power.png" alt="icone_pouvoir"/>)</strong>
													est de prendre directement sur la Maison d'un adversaire du pouvoir que vous mettez sur votre
													Maison.
												</li>
											</ul>
										</p>
										<p class="text-justify">
											Quand la phase de défis commence, le premier joueur peut initier 1 seul défi de chaque type et choisir sa
											cible à chaque fois. Chaque défi doit être complètement résolu avant de passer au suivant. Une fois tous
											les défis souhaités par le Premier Joueur résolus, c'est au joueur suivant, dans le sens des aiguilles
											d'une montre, de lancer ses propres défis. Le joueur initiant des défis actuellement est appelé Joueur
											Actif.
										</p>
										<h4>Résolution des défis</h4>
											<p class="text-justify">
												Tous les défis suivent ce schéma :
												<strong><ol>
													<li>Déclarer les attaquants</li>
													<li>Déclarer les défenseurs</li>
													<li>Résolution</li>
												</ol></strong>
											</p>
											<p class="text-justify">
												Avant et après (mais pas pendant) chacune de ces étapes, les joueurs peuvent jouer des cartes ou
												utiliser des effets jouables pendant la phase de défis.
											</p>
											<h5><u>Etape 1 : Déclarer les attaquants</u></h5>
												<p class="text-justify">
													Annoncez quel type de défi va être lancé et quelle Maison adverse vous allez affronter, puis
													inclinez n'importe quel nombre de personnages <strong>possédant l'icône défi appropriée</strong>
													pour attaquer la Maison adverse. Les personnages déjà inclinés ne peuvent être déclarés comme
													attaquants. Vous devez déclarer au moins 1 personnage attaquant pour initier un défi.
												</p>
											<h5><u>Etape 2 : Déclarer les défenseurs</u></h5>
												<p class="text-justify">
													L'adversaire dont la Maison est défiée incline n'importe quel nombre de personnages avec l'icône
													défi appropriée pour se défendre contre votre défi. Les personnages déjà inclinés ne peuvent être
													déclarés comme défenseurs. Votre adversaire doit avoir au moins 1 personnage pour se défendre
													contre un défi.
												</p>
											<h5><u>Etape 3 : Résolution</u></h5>
												<p class="text-justify">
													Comparez le total de force (FOR) de vos personnages engagés dans le défi, avec le total de FOR des
													personnages du joueur défenseur engagés dans le défi. Le joueur qui a le plus grand total gagne le
													défi. En cas de FOR égale, le joueur attaquant remporte le défi, tant qu'il a au moins 1 point de
													FOR de son côté. Un défi ne peut pas être remporté par un attaquant ou un défenseur ayant un total
													de FOR inférieur à 1, ou qui n'a pas de personnage participant au moment de la résolution du défi.
												</p>
												<p class="text-justify">
													Si vous gagnez un défi en tant qu'<strong>attaquant</strong>, suivez les conséquences indiquées
													selon le défi initialement entrepris :
													<dl>	
														<dt>Défi militaire</dt>
														<dd>L'adversaire défenseur doit choisir et tuer un nombre de ses personnages égal à la valeur
															de prise de la carte complot révélée du joueur attaquant (<strong>il ne s'agit pas
															forcément de personnages ayant participé au défi</strong>). Les personnages tués sont
															placés dans la pile des morts de leur propriétaire.</dd>
														<dt>Défi d'intrigue</dt>
														<dd>L'adversaire défenseur doit se défausser, au hasard, d'un nombre de cartes égal à la
															valeur de prise de la carte complot révélée du joueur attaquant.</dd>
														<dt>Défi de pouvoir</dt>
														<dd>L'adversaire défenseur prend un nombre de points de pouvoir de sa Maison égal à la valeur
															de prise de la carte complot révélée du joueur attaquant, et les place sur la Maison de
															celui-ci.</dd>
													</dl>
												</p>
										<h4>Exemple de défi</h4>
											<p class="text-justify">
												<em>Franck (Maison Stark) lance un défi militaire contre Micha&euml;l (Maison Lannister). Il incline</em>
												Jon Snow <em>(FOR 3) pour attaquer.</em>
											</p>
											<p class="text-justify">
												<em>La prise de la carte complot révélée de Franck est de 1. Si Franck remporte le défi, Micha&euml;l
												devra choisir et tuer 1 de ses personnages en jeu.</em>
											</p>
											<p class="text-justify">
												<em>Ils passent à l'étape 2 : déclarer les défenseurs. Michae&euml;l incline</em> Ser Gregor Clegane
												<em>(FOR 4) pour défendre.</em>
											</p>
											<p class="text-justify">
												<em>Actuellement, la FOR totale de Francl est de 3, et celle de Micha&euml;l est de 4.</em>
											</p>
											<p class="text-justify">
												<em>Frank décide maintenant de jouer</em> La brûlure du froid<em>, un évènement dont le texte dit :
												&quot;</em>Défis : inclinez 1 influence pour choisir un personnage. Ce personnage gagne +3 FOR
												jusqu'à la fin du défi. Quand le défi se résout, ce personnage gagne : 'jusqu'à la fin de la phase -1
												FOR et est tué si sa FOR est 0'.&quot; <em>Cet effet porte la FOR de Jon Snow à 6. Pas mal !</em>
											</p>
											<p class="text-justify">
												<em>Ni Franck, ni Micha&euml;l n'a d'autre effet à jouer, ils passent donc à l'étape 3 : résolution.</em>
											</p>
											<p class="text-justify">
												<em>La FOR totale de Franck est de 6, celle de Micha&euml,l est de 4. Avec un total supérieur, Franck
												remporte le défi ! Il ne prend pas de point pour défi sans opposition puisque la FOR de Micha&euml;l
												est supérieure à 0.</em>
											</p>
											<p class="text-justify">
												<em>Puisqu'il a perdu un défi militaire en défense, Micha&euml;l doit tuer l'un de ses personnages...</em>
												Jaime Lannister <em>sera la victime. Jaime quitte le jeu et rejoint la pile des morts de Micha&euml;l.</em>
											</p>
											<p class="text-justify">
												<em>Micha&euml;l ne peut plus jouer de copie de</em> Jaime Lannister <em>tant que celui-ci est dans sa
												pile des morts. Si Jaime avait un doublon, Micha&euml;l aurait pu choisir de défausser le doublon pour
												éviter de tuer Jaime.</em>
											</p>
											<p class="text-justify">
												<em>Après la résolution du défi,</em> Jon Snow <em>est affecté par la deuxième partie de l'évènement,
												et sa FOR descend à 2 pour le reste de la phase.</em>
											</p>
										<h4>Si c'est le défenseur qui gagne</h4>
											<p class="text-justify">
												Si vous remportez un défi en tant que défenseur, aucun effet ne se produit (à part les effets de carte
												mentionnant un déclenchement d'effet par un joueur qui &laquo; remporte le défi &raquo;). Considérez
												simplement que vous avez contré le défi lancé contre votre Maison.
											</p>
										<h4>Personnages participants</h4>
											<p class="text-justify">
												Un personnage attaquant ou défendant dans un défi en cours est appelé &laquo; personnage participant
												&raquo;. Si, pour quelque raison que ce soit, le personnage est retiré du défi avant sa résolution, il
												n'est plus considéré comme un personnage participant.
											</p>
										<h4>Défi sans opposition</h4>
											<p class="text-justify">
												Pendant la résolution de n'importe quel défi, si un <strong>attaquant</strong> gagne, et que le
												défenseur a un total de FOR de 0 (ou pas de personnage participant), l'attaquant prend, en plus des
												effets habituels des défis, 1 point de pouvoir bonus de la réserve, qu'il place sur sa Maison. Ce
												point bonus vient s'ajouter à toutes les autres conséquences possibles du défi.
											</p>
											<p class="text-justify">
												Une fois que tous les joueurs ont résolu tous leurs défis, passez à la phase d'hégémonie.
											</p>
									<a name="hegemonie"></a> <!-- ancre Phase 5 -->
									<h3>Phase 5 : Hégémonie</h3>
										<p class="text-justify">
											Tous les joueurs comptabilisent le total de FOR de tous leurs personnages en <strong>position redressée et
											ajoutent 1 à ce total pour chaque pièce d'or dans leur trésor</strong>. Le joueur qui obtient le meilleur
											résultat gagne la phase d'hégémonie et prend 1 point de pouvoir sur sa Maison. Il n'y a pas de gagnant en
											cas d'égalité. Le point est gagné pour l'hégémonie avant que les joueurs ne puissent accomplir une
											quelconque action (telle que jouer un évènement qui redresse un personnage incliné ou qui vole de l'or au
											trésor adverse). L'exception étant certains effets passifs, qui se produisent au début de la phase
											d'hégémonie.
										</p>
									<a name="redressement"></a> <!-- ancre Phase 6 -->
									<h3>Phase 6 : Redressement</h3>
										<p class="text-justify">
											Tous les joueurs redressent simultanément tous leurs personnages, lieux et attachements qui étaient
											inclinés.
										</p>
									<a name="impot"></a> <!-- ancre Phase 7 -->
									<h3>Phase 7 : Impôt</h3>
										<p class="text-justify">
											Tous les joueurs déplacent simultanément l'or non dépensé de leur trésor vers la Réserve d'or. Quand tous
											les joueurs ont complété la phase d'impôt, un nouveau tour commence et le jeu continue par la phase de
											complot.
										</p>
										<p class="text-justify">A la fin du tour, tous les titres sont retournés à la Chambre du Conseil restreint.</p>
									<div class="astuce bg-warning">
										<h4>Utilisations alternatives de l'or</h4>
										<p class="text-justify">
											<em>En plus de payer les coûts des cartes que vous jouez au recrutement, il y a d'autres raisons de
											conserver votre or tout au long du tour.</em>
										</p>
										<p class="text-justify">
											<em>Certaines cartes ont des effets qui nécessitent de payer de l'or en dehors de la phase de
											recrutement. Par exemple, la carte de</em> Tyrion Lannister <em>dit :</em> &quot;Réponse : quand vous
											remportez un défi <img src="http://www.agotcards.org/images/icons/ico_intrigue.png" alt="icone_intrigue"/>
											ou un défi auquel Tyrion Lannister a participé, payez 1 or pour piocher une carte.&quot; <em>L'or doit
											toujours être payé depuis votre trésor, à part si les instructions d'une carte précisent autre chose.</em>
										</p>
										<p class="text-justify">
											<em>D'autres cartes peuvent interagir avec votre trésor de manière passive. Par exemple,</em>
											Littlefinger <em>:</em> &quot;Littlefinger gagne +1 FOR pour chaque or dans son trésor.&quot; <em>Pour
											profiter de cette capacité, vous allez devoir garder de l'or dans votre trésor à chaque tour et plus
											vous en garderez, plus Littlefinger sera puissant.</em>
										</p>
										<p class="text-justify">
											<em>Chaque or dans votre trésor sera ajouté à votre calcul quand vous compterez les points de FOR
											redressés pendant l'hégémonie, ainsi nul or n'est complètement perdu.</em>
										</p>
										<p class="text-justify">
											<em>Pour terminer, certaines cartes vous permettent de garder de l'or d'un tour à l'autre. Par exemple,
											la carte</em> Prévision <em>dit :</em> &quot;Sautez la phase d'impôt de ce tour.&quot; <em>Avec des
											cartes comme celle-ci, vous pouvez faire des plans pour le futur et économiser de l'or pour un gros
											tour.</em>
										</p>
									</div>
									<h3>Pouvoir et victoire</h3>
										<p class="text-justify">
											Quand vous devez &quot;prendre du pouvoir pour votre Maison&quot;, prenez X jetons de pouvoir de la Salle
											du Trône (voir &quot;mise en place du jeu&quot;) et placez-les sur votre carte Maison.
										</p>
										<p class="text-justify">
											Il y a beaucoup d'effets de carte qui permettent aux personnages de récupérer des points de pouvoir. Les
											points de pouvoir ainsi gagnés viennent de la Salle du Trône, mais ils sont placés sur les personnages au
											lieu d'être placés sur la carte Maison. Ils comptent dans votre total de points de pouvoir, mais ne sont
											pas comptés dans le pouvoir de votre Maison. Si un personnage quitte le jeu pour quelque raison que ce
											soit, les points de pouvoir sur ce personnage sont perdus (ils retournent dans la Salle du Trône).
										</p>
							</div>
							<div class="tab-pane" id="titresMulti">
								<h2>Les titres multijoueurs</h2>
								<p class="text-justify">
									Voici une explication détaillée des termes, effets, symboles et restrictions associés aux six Titres multijoueurs.
								</p>
									<h3>Soutien</h3>
										<p class="text-justify">
											Si votre titre en soutient un autre, vous ne pouvez pas lancer de défi contre le joueur qui détient ce
											titre. De plus, quand un joueur que vous soutenez est attaqué par un autre joueur, si le joueur défenseur
											ne déclare pas de défenseur, vous pouvez déclarer n'importe quel nombre de vos propres personnages
											(redressés) en défense dans ce défi. Si votre personnage défend dans un défi en soutien d'un autre joueur,
											vous êtes considéré comme le gagnant (ou le perdant, selon le résultat) de ce défi, mais la cible
											originale est toujours celle qui doit absorber la prise en cas de défaite (si l'attaquant gagne, le joueur
											que vous avez défendu devra prendre les dégâts résultants du défi). La furtivité doit être déclarée contre
											les personnages du joueur ciblé à l'origine.
										</p>
										<p class="text-justify">
											<em><strong>Exemple :</strong> Didier, avec le titre Grand Argentier, soutient Maude, qui a le titre Grand
											Législateur. Cela veut dire que Didier ne peut pas lancer de défi à Maude et qu'il peut déclarer des
											défenseurs pour un défi lancé contre Maude dans lequel elle n'a pas déclaré de défenseurs.</em>
										</p>
										<p class="text-justify">
											<em>Guillaume lance un défi militaire à Maude et déclare la furtivité des personnages concernés. Maude ne
											déclare aucun défenseur dans ce défi. Comme Didier soutient Maude, il a la possibilité de déclarer des
											personnages en défense dans ce défi. Comme Didier ne veut pas que Guillaume prenne un pouvoir pour
											non-opposition, il met un de ses personnages en défense. Si Didier remporte le défi, il est considéré
											comme le vainqueur dnas le cadre du jeu éventuel de réponses, d'effets passifs et des mots-clés. Néanmoins,
											Maude devra satisfaire la prise si Didier ne remporte pas le défi.</em>
										</p>
										<p class="text-justify">
											Quatre des six titres soutiennent un autre titre, tel que ci-dessous :
											<ul>
												<li>Le Grand Législateur soutient la Main du Roi</li>
												<li>La Main du Roi soutient le Maître des Murmures</li>
												<li>Le Maître des Murmures soutient le Grand Argentier</li>
												<li>Le Grand Argentier soutient le Grand Législateur</li>
											</ul>
										</p>
									<h3>Opposition</h3>
										<p class="text-justify">
											Si votre titre est opposé à un autre, vous êtes récompensé quand vous remportez un défi contre le joueur
											qui porte ce titre. Quand vous remportez un défi contre un titre opposé, vous prenez 1 pouvoir pour votre
											Maison, ceci en addition de ceux que vous aurez éventuellement gagnés pour avoir remporté le défi. Vous ne
											pouvez pas gagner plus d'un point de pouvoir par tour de cette manière.
										</p>
										<p class="text-justify">
											<em><strong>Exemple :</strong> Le Maître des Murmures dit :</em> &quot;Opposition : Grand Législateur,
											Régent de la Couronne.&quot; <em>Si vous choisissez ce titre et que vous remportez un défi contre le
											joueur qui choisit le Grand Législateur, vous prenez 1 point de pouvoir pour votre Maison. Pour le restant
											de ce tour, si vous remportez un autre défi contre le joueur qui joue le Grand Législateur ou celui qui
											joue le Régent de la Couronne, vous ne pourrez pas prendre 1 pouvoir additionnel de cette façon.</em>
										</p>
										<p class="text-justify">
											Les titres sont opposés les uns aux autres de la manière suivante :
											<ul>
												<li>La Main du Roi est opposée au Grand Argentier</li>
												<li>Le Grand Législateur est opposé au Maître des Murmures</li>
												<li>Le Maître des Murmures est opposé au Grand Législateur ET au Régent de la Couronne</li>
											</ul>
										</p>
										<p class="text-justify">
											Sur le plateau, les titres sont placés à côté des titres qu'ils soutiennent. De plus, une flèche sombre
											pointe vers le(s) titre(s) opposé(s).
										</p>
									<h3>Effets des titres</h3>
										<h4>Régent de la Couronne</h4>
											<p class="text-justify">
												Si vous choisissez cette carte, vous ajoutez +3 à votre FOR totale dans les défis
												<img src="http://www.agotcards.org/images/icons/ico_power.png" alt="icone_pouvoir"/> dans lesquels
												vous avez au moins 1 personnage participant. Cette carte permet également de rediriger un défi par
												tour. Quand un joueur lance un défi et déclare la cible et les attaquants, vous pouvez incliner cette
												carte pour le forcer à choisir une nouvelle cible ! Attention : s'il lui est interdit d'attaquer la
												nouvelle cible, il attaque la première cible à la place. On ne peut jamais s'attaquer soi-même.
											</p>
										<h4>Main du Roi</h4>
											<p class="text-justify">
												Si vous choisissez cette carte, vous pouvez l'incliner (à n'importe quel moment) pour gagner 2
												influences.
											</p>
										<h4>Grand Législateur</h4>
											<p class="text-justify">
												Vous piochez une carte supplémentaire à la phase de pioche (en plus des 2 habituelles). Cette carte
												additionnelle ne compte pas dans votre limite de pioche maximale.
											</p>
										<h4>Lord Commandant de la Garde Royale</h4>
											<p class="text-justify">
												Vous ajoutez +3 à votre FOR totale dans les défis
												<img src="http://www.agotcards.org/images/icons/ico_military.png" alt="icone_militaire"/> dans
												lesquels vous avez au moins 1 personnage participant. Cette carte permet également de rediriger contre
												vous-même un défi <img src="http://www.agotcards.org/images/icons/ico_military.png" alt="icone_militaire"/>
												non défendu par tour. Quand un adversaire est attaqué par un autre adversaire dans un défi
												<img src="http://www.agotcards.org/images/icons/ico_military.png" alt="icone_militaire"/> et décide de
												ne pas défendre, vous pouvez incliner cette carte pour changer la cible de l'attaque. L'attaquant ne
												peut pas changer d'avis, et tous les personnages qu'il a déclarés attaquants vous attaquent ! Si vous
												remportez le défi, déplacez un pouvoir de sa Maison sur la vôtre. Si, pour une raison quelconque, vous
												ne pouvez pas être la cible de l'attaque, vous ne pouvez pas utiliser cette capacité.
											</p>
											<p class="text-justify">
												La capacité de rediriger sur le Lord Commandant de la Garde Royale se produit juste après les
												déclarations des cibles de la furtivité et des défenseurs. Cette capacité annule cette étape et rouvre
												l'étape action des joueurs entre la déclaration des attaquants (contre la nouvelle cible) et
												l'assignation de la furtivité.
											</p>
										<h4>Maître des Murmures</h4>
											<p class="text-justify">
												Vous ajoutez +3 à votre FOR totale dans les défis
												<img src="http://www.agotcards.org/images/icons/ico_intrigue.png" alt="icone_intrigue"/> dans lesquels
												vous avez au moins 1 personnage participant.
											</p>
										<h4>Grand Argentier</h4>
											<p class="text-justify">Ajoutez 2 or à vos revenus.</p>
							</div>
							<div class="tab-pane" id="autresConcepts">
								<h2>Autres concepts du jeu</h2>
									<h3>Cartes uniques</h3>
										<p class="text-justify">
											Certaines cartes ont une icône de bannière
											(<img src="http://www.agotcards.org/images/flag_small.gif" alt="icone_banniere"/>) à côté de leur titre.
											De telles cartes sont <strong>uniques</strong>. Chaque joueur ne peut avoir qu'un seul exemplaire de la
											même carte unique en jeu. Vous ne pouvez donc pas mettre en jeu ou prendre le contrôle d'une carte unique
											que vous contrôlez déjà (à l'exception des doublons, voir ci-dessous).
										</p>
										<p class="text-justify">
											Vous ne pouvez pas non plus jouer ou prendre le contrôle d'une carte unique si un exemplaire de celle-ci
											se trouve dans votre pile des morts ou si votre adversaire a pris le contrôle d'un exemplaire de cette
											carte appartenant à votre deck.
										</p>
									<h3>Doublons</h3>
										<p class="text-justify">
											Si vous avez en main un <strong>doublon</strong> (une autre carte avec exactement le même nom) d'une carte
											unique et que vous <strong>contrôlez <em>et</em> possédez</strong> (<em>vous possédez une carte que vous
											avez amenée dans le jeu, et vous contrôlez une carte que vous avez jouée, tant que personne ne vous l'a
											prise par un effet de carte</em>) une version de cette carte en jeu, vous pouvez
											<strong>attacher le doublon</strong> à votre carte unique en jeu, <strong>gratuitement</strong>, durant
											votre recrutement. Mettez simplement le doublon sous la version déjà en jeu.
										</p>
										<p class="text-justify">
											Si l'une de vos cartes uniques en jeu est tuée, défaussée, <strong>remise dans votre deck</strong> ou
											<strong>remontée dans votre main</strong>, vous pouvez, en <strong>réponse</strong> (voir plus loin),
											défausser un doublon pour sauver cette carte.
										</p>
										<p class="text-justify">
											Un doublon est considéré comme n'ayant ni texte, ni titre, ni trait, ni vertu.
										</p>
										<p class="text-justify">
											Les doublons, une fois joués, <em>ne sont pas</em> considérés comme des attachements. Bien qu'ils soient
											attachés à d'autres cartes, ils ne sont pas affectés par les effets qui visent les attachements. Les
											doublons n'ont ni texte, ni titre, ni traits. Les doublons peuvent uniquement être joués sur des cartes
											uniques que vous contrôlez et possédez. Une carte attachée de la sorte est une &laquo; carte doublon
											&raquo; tant qu'elle est en jeu et attachée à une carte portant le même nom. Il n'y a pas de limite au
											nombre de doublons pouvant être joués sur la même carte.
										</p>
									<h3>Versions multiples de personnages</h3>
										<p class="text-justify">
											Des versions différentes d'une même carte unique (par exemple des cartes qui portent le même nom mais ont
											des effets et des valeurs différents) sont considérées comme étant la même carte unique (une seule version
											peut donc être en jeu de votre côté). Si vous jouez avec plusieurs versions d'une carte unique, et que
											vous avez la possibilité de mettre un doublon d'une version différente, seules les capacités de la
											première carte jouée (celle du dessus) sont prises en compte. On ne peut pas échanger une carte avec son
											doublon.
										</p>
									<h3>Cartes multi-Maisons</h3>
										<p class="text-justify">
											Certaines cartes possèdent deux (ou plus) armoiries de Maison. Ces cartes multi-Maisons sont considérées
											affiliées à toutes les Maisons dont elles possèdent les armoiries pour tout ce qui concerne les effets de
											jeu.
										</p>
							</div>
							<div class="tab-pane" id="motsCles">
								<h2>Mots-clés</h2>
								<p class="text-justify">
									Certaines cartes ont un mot-clé dans leur texte. Ils apparaissent toujours en premier dans le cadre réservé au
									texte de règle. Les mots-clés sont expliqués ci-dessous.
								</p>
									<h3>Tueur</h3>
										<p class="text-justify">
											Pendant un défi (de n'importe quel type), si le joueur attaquant contrôle plus de personnages participants
											avec le mot-clé &quot;Tueur&quot; que le joueur défenseur, ce dernier doit choisir et tuer un personnage
											participant en défense, ceci à la résolution du défi <strong>et quel qu'en soit le vainqueur</strong>.
											Notez qu'en cas de défi militaire, Tueur ne crée pas de perte supplémentaire si tous les personnages
											défenseurs pouvant mourir ont déjà été choisis pour satisfaire la perte du défi militaire.
										</p>
									<h3>Condamné</h3>
										<p class="text-justify">
											Les cartes portant le mot-clé &quot;Condamné&quot; sont placées dans la pile de morts au lieu de la pile
											de défausse quand elles quittent le jeu. Si elles sont défaussées d'une main, et donc non jouées, elles
											rejoignent normalement la pile de défausse. Les évènements &quot;condamnés&quot; ne rejoignent la pile des
											morts que s'ils ont été joués avec succès. Si leurs effets sont annulés, ces évènements sont placés dans
											la pile de défausse.
										</p>
									<h3>Immunité</h3>
										<p class="text-justify">
											Certaines cartes ont des mots-clés &quot;Immunisé&quot;, comme &quot;Immunisé aux capacités de personnages&quot;,
											 &quot;Immunisé aux effets déclenchés&quot; ou &quot;Immunisé aux évènements&quot;. Une carte portant ce
											mot-clé ignore les effets auxquels elle est immunisée. De plus, elle ne peut même pas être la cible d'un
											effet auquel elle est immunisée.
										</p>
									<h3>Limité</h3>
										<p class="text-justify">
											Vous ne pouvez jouer qu'une seule carte limitée par tour (quel que soit le type de la carte).
										</p>
										<p class="text-justify">
											Notez que certaines cartes proposent des &quot;<strong>Réponse limitée</strong>&quot;, à ne pas confondre
											avec le mot-clé Limité. Comme indiqué sur ces cartes, chaque joueur ne peut déclencher qu'une seule
											&quot;<strong>Réponse limitée</strong>&quot; par tour.
										</p>
									<h3>Pas d'attachement</h3>
										<p class="text-justify">
											Une carte avec le mot-clé &quot;pas d'attachement&quot; ne peut jamais recevoir d'attachement.
										</p>
										<p class="text-justify">
											Cependant, les doublons peuvent être joués sur une carte unique avec la mention &quot;pas d'attachement&quot;,
											car les doublons ne sont pas des attachements.
										</p>
									<h3>Renom</h3>
										<p class="text-justify">
											Quand vous remportez un défi (en attaque comme en défense), tous vos personnages avec &quot;Remon&quot;
											qui ont participé prennent 1 pouvoir après la résolution du défi.
										</p>
									<h3>Furtivité</h3>
										<p class="text-justify">
											Pour chacun de vos personnages attaquants ayant &quot;Furtivité&quot;, vous pouvez choisir un personnage
											<strong>sans</strong> &quot;Furtivité&quot; du côté adverse <strong>qui ne pourra pas défendre durant ce
											défi</strong>. Le choix est fait immédiatement avant la déclaration des défenseurs.
										</p>
									<h3>Mise en place</h3>
										<p class="text-justify">
											Les cartes avec le mot-clé &quot;Mise en place&quot; peuvent être jouées à l'étape 6 de la mise en place
											du jeu, quel que soit le type de la carte contenant ce mot-clé.
										</p>
									<h3>Joute</h3>
										<p class="text-justify">
											Tant qu'un attaquant avec le mot-clé &quot;Joute&quot; attaque seul, l'adversaire en défense ne peut pas
											déclarer plus d'1 personnage comme défenseur.
										</p>
									<h3>Mêlée</h3>
										<p class="text-justify">
											Tant qu'un personnage avec le mot-clé &quot;Mêlée&quot; participe à un défi, il gagne +1 FOR pour chaque
											personnage participant contrôlé par un adversaire.
										</p>
								<h2>Mots-clés spécifiques aux six Maisons</h2>
									<h3>Imprévisible (<img src="../../webroot/media/images/icones/ico_Targaryen.png" alt="icone_Targaryen"/>)</h3>
										<p class="text-justify">
											Vous pouvez mettre en jeu depuis votre main une carte avec le mot-clé &quot;Imprévisible&quot; en tant
											qu'action &quot:<strong>N'importe quelle phase</strong>&quot;, en payant son coût imprimé en or avec de
											l'influence.
										</p>
									<h3>Infâme (<img src="../../webroot/media/images/icones/ico_Lannister.png" alt="icone_Lannister"/>)</h3>
										<p class="text-justify">
											Quand vous prenez du pouvoir pour votre Maison, vous pouvez le placer sur n'importe quelle carte avec le
											mot-clé &quot;Infâme&quot; au lieu de le mettre sur votre Maison. Le pouvoir sur les cartes &quot;infâmes&quot;
											compte dans votre total pour la victoire, quel que soit le type de la carte.
										</p>
									<h3>Intimidant (<img src="../../webroot/media/images/icones/ico_Greyjoy.png" alt="icone_Greyjoy"/>)</h3>
										<p class="text-justify">
											Tant qu'un personnage avec le mot-clé &quot;Intimidant&quot; attaque, les personnages adverses avec une
											force inférieure à ce personnage ne comptent pas leur FOR pour le défi en cours.
										</p>
									<h3>Loyal (<img src="../../webroot/media/images/icones/ico_Stark.png" alt="icone_Stark"/>)</h3>
										<p class="text-justify">
											Quand une carte avec le mot-clé &quot;Loyal&quot; est tuée ou défaussée du jeu, elle est placée sur le
											dessus de votre deck au lieu de la pile des morts ou de la défausse.
										</p>
									<h3>Vindicatif (<img src="../../webroot/media/images/icones/ico_Martell.png" alt="icone_Martell"/>)</h3>
										<p class="text-justify">
											Quand vous perdez un défi en défense, vous pouvez redresser n'importe quel nombre de cartes avec le
											mot-clé &quot;Vindicatif&quot; que vous contrôlez.
										</p>
									<h3>Vigilant (<img src="../../webroot/media/images/icones/ico_Baratheon.png" alt="icone_Baratheon"/>)</h3>
										<p class="text-justify">
											Quand vous remportez un défi en attaque, vous pouvez redresser n'importe quel nombre de cartes avec le
											mot-clé &quot;Vigilant&quot; que vous contrôlez.
										</p>
							</div>
							<div class="tab-pane" id="reglesAvancees">
								<h2>Règles avancées</h2>
								<p class="text-justify">
									En jouant au Trône de Fer, vous rencontrerez tôt ou tard des situations qui nécessitent des précisions. Vous
									trouverez ci-dessous des réponses à plusieurs cas de figure complexes qui pourraient se présenter pendant une
									partie.
								</p>
									<h3>Jouer des cartes</h3>
										<p class="text-justify">
											Vous êtes seulement autorisé à jouer des personnages, des lieux, des évènements qui requièrent un coût en
											or et des attachements pendant <em>votre</em> tour de la phase de recrutement. Les cartes évènement et
											les capacités de cartes peuvent être jouées à n'importe quel moment de la phase indiquée en gras au début
											de leur texte de règle. Si une capacité de carte indique &laquo; n'importe quelle phase &raquo;, c'est que
											cette capacité est jouable à n'importe quelle phase du jeu.
										</p>
									<h3>Etat &quot;en jeu&quot;</h3>
										<p class="text-justify">
											Toutes les cartes du jeu sont considérées &quot;en jeu&quot;, <strong>sauf</strong> :
											<ol type="a">
												<li>les cartes dans votre deck</li>
												<li>les cartes dans votre pile de défausse et dans votre pile des morts</li>
												<li>les cartes dans votre main</li>
												<li>votre Agenda</li>
											</ol>
										</p>
									<h3>Carte retirée de la partie</h3>
										<p class="text-justify">
											Certains effets retirent des cartes de la partie. Ces cartes sont définitivement écartées de la partie et
											ne peuvent plus y revenir ni interagir avec le jeu.
										</p>
									<h3>Limite de pioche</h3>
										<p class="text-justify">
											Un joueur ne peut pas, par l'effet de cartes, piocher plus de 3 cartes additionnelles en plus des 2 qu'il
											tire pendant la phase de pioche. Un joueur tire normalement 2 cartes pendant la phase de pioche et peut,
											par l'effet de cartes, piocher au maximum 3 cartes de plus pendant un même tour. Notez que seuls les
											effets qui comportent le mot &laquo; pioche &raquo; sont concernés par cette règle.
										</p>
									<h3>Défis militaires avec une prise supérieure à 1</h3>
										<p class="text-justify">
											Si le défenseur perd un défi militaire alors que l'attaquant a une prise de 2 ou plus, le défenseur doit
											choisir et tuer le nombre requis de personnages <strong>différents</strong>. Le défenseur ne peut pas tuer
											plusieurs fois le même personnage, même si ce personnage peut être sauvé.
										</p>
									<h3>Actions, effets déclenchés et capacités passives</h3>
										<p class="text-justify">
											<dl>
												<dt>Faire une action</dt>
												<dd>C'est lorsqu'une carte est jouée (même lors de la phase de recrutement) ou qu'une capacité de
													carte est utilisée par une carte déjà en jeu. Les effets de chaque action sont résolus
													immédiatement après avoir été déclarés. Une fois qu'une action est complètement résolue, une autre
													action peut être jouée.<br/>
													Le Premier Joueur a toujours la possibilité de jouer la première action de chaque phase (mais ne
													peut pas jouer de personnage, attachement ou lieu pendant la phase de recrutement si ce n'est pas
													son tour). Après la résolution d'une action d'un joueur, il doit permettre à chaque adversaire
													(dans le sens des aiguilles d'une montre) de jouer une action ou de passer.</dd>
												<dt>Effet déclenché</dt>
												<dd>C'est une capacité de carte qui commence par un mot en gras, comme &laquo; <strong>Défis :</strong>
													&raquo; par exemple.</dd>
												<dt>Capacité passive</dt>
												<dd>C'est une capacité sur une carte en jeu qui se déclenche automatiquement, sans intervention des
													joueurs. Certaines capacités passives sont déclenchées automatiquement à un moment donné, alors
													que d'autres peuvent avoir des effets durables. Les actions et les capacités passives ne sont pas
													interchangeables ; si une carte a une capacité passive, le déclenchement de cette capacité n'est
													pas considéré comme l'accomplissement d'une action. Les capacités passives sont toujours résolues
													avant les actions d'un joueur. Une capacité passive n'est pas un effet déclenché.</dd>
											</dl>
										</p>
									<h3>Réponses</h3>
										<p class="text-justify">
											Certaines cartes possèdent le texte &laquo; <strong>Réponse :</strong> &raquo;. Ces cartes et ces
											capacités peuvent être jouées ou utilisées seulement quand elles sont dans l'état défini sur la carte en
											question. Les réponses sont résolues avant que la prochaine action ne puisse être jouée. Les réponses
											<strong>ne sont pas</strong> des actions, mais <strong>ce sont des effets déclenchés</strong>.
										</p>
										<h4>Sauver / annuler</h4>
											<p class="text-justify">
												Quand un joueur fait une action par l'intermédiaire d'une carte ou d'une capacité de carte déjà en jeu,
												son action doit être résolue dans son intégralité avant d'en entamer une nouvelle. Les réponses contenant
												les mots <strong>sauver</strong> ou <strong>annuler</strong> dans leur texte sont une exception à cette
												règle.
											</p>
											<p class="text-justify">
												Les réponses d'annulation interrompent une action et empêchent ses effets de s'appliquer. Toutefois,
												le coût éventuel d'une action annulée doit tout de même être payé.
											</p>
											<p class="text-justify">
												<em><strong>Exemple :</strong> Chris incline 1 influence pour jouer l'évènement</em> Lynché par la
												foule<em>, mais Damien répond en jouant</em> Plans contrés<em>, un évènement qui annule celui de Chris.
												Les effets de</em> Lynché par la foule <em>ne se produisent pas, mais l'évènement est considéré comme
												joué et l'influence est dépensée.</em>
											</p>
											<p class="text-justify">
												Les réponses de sauvegarde interrompent une action et empêchent une carte d'être tuée ou défaussée du
												jeu. Toutefois, le coût éventuel de l'action tentée doit tout de même être payé.
											</p>
									<h3>Etat &quot;moribond&quot;</h3>
										<p class="text-justify">
											Avant qu'une carte ne quitte le jeu pour une raison quelconque (tuée, défaussée, remise en main, etc.), et
											si elle n'est pas sauvée ou annulée, elle devient <strong>moribonde</strong>. C'est un état temporaire,
											qui signifie que la carte est en train de quitter le jeu. Durant ce laps de temps, les joueurs ont encore
											l'occasion de jouer des réponses, même si elles proviennent de la carte moribonde elle-même. La seule
											restriction est qu'aucun coût pour réaliser une action ne peut rendre la carte moribonde une seconde fois.
											La carte moribonde quitte effectivement le jeu une fois que toutes les réponses et effets ont été résolus.
										</p>
									<h3>Effets durables</h3>
										<p class="text-justify">
											La majorité des effets durent le temps de l'action elle-même (immédiatement après avoir été déclenchés),
											cependant certains effets fonctionnent tout au long d'une période donnée, ou parfois même indéfiniment.
											Ces effets, qui se prolongent plus longtemps qu'une simple action, sont appelés
											<strong>effets durables</strong>. Plusieurs effets durables peuvent affecter en même temps une même carte.
											L'ordre dans lequel s'appliquent les effets durables n'a pas la moindre importance - c'est la somme de ces
											effets qui compte.
										</p>
										<p class="text-justify">
											<em><strong>Exemple :</strong> un personnage sans icône militaire pourrait être simultanément affecté par
											</em>L'Art de la guerre<em>, qui ajoute une icône militaire au personnage, et par</em> Le Bras cassé
											<em>qui, lui, enlève une icône militaire. Ces deux effets durables se neutralisent et le personnage n'a
											toujours pas d'icône militaire.</em>
										</p>
										<p class="text-justify">
											Si la FOR d'un personnage descend en-dessous de 0 après l'application d'effets, sa FOR est arrondie à 0.
										</p>
									<h3>Jeu en tournoi et règles de construction de deck</h3>
										<p class="text-justify">
											Une bonne partie du plaisir de jouer au <em>Trône de Fer</em> réside dans la personnalisation de son
											propre deck et la participation à des tournois. Quand vous construisez votre propre jeu pour un tournoi,
											les règles ci-dessous s'appliquent. Ce sont des règles générales, mais il est possible de ne pas s'y tenir
											parfois, à condition que tous les joueurs disposent des mêmes consignes pour se préparer au tournoi.
											<ul>
												<li>Votre deck complot doit contenir exactement 7 cartes et aucune ne peut se trouver à plus d'1
													exemplaire.</li>
												<li>Votre deck doit contenir un minimum de 60 cartes, et ne peut contenir plus de 3 exemplaires d'une
													carte avec le même nom.</li>
												<li>Votre deck complot et votre deck ne peuvent contenir aucune carte portant la mention &quot;Maison
													X uniquement&quot;, à moins que la Maison X ne corresponde justement à celle que vous avez choisie
													(c'est-à-dire celle écrite sur votre carte Maison).</li>
											</ul>
										</p>
							</div>
							<div class="tab-pane" id="variantesJeu">
								<h2>Variantes de jeu</h2>
									<h3>3 joueurs</h3>
										<p class="text-justify">
											Lors d'une partie à 3 joueurs, les titres multijoueurs ne sont pas réutilisés tant que tous les titres
											n'ont pas tous été choisis une fois. Cela signifie que les joueurs ont le choix parmi les 6 titres au
											premier tour, puis parmi les 3 restants au deuxième tour.
										</p>
									<h3>2 joueurs</h2>
										<p class="text-justify">
											Les titres ne sont pas du tout utilisés pendant un duel. Le jeu ne change donc pas, mais il faut bien
											entendu supprimer totalement l'étape 2 de la phase de complots (choix des titres multijoueurs), et passer
											directement à la phase de résolution des complots.
										</p>
									<h3>Variante &laquo; Deux couronnes &raquo;</h3>
										<p class="text-justify">
											Cette variante se joue avec deux équipes de deux joueurs en face à face. La première équipe à atteindre 30
											points de pouvoir au total, quelle que soit la combinaison entre les deux joueurs, gagne. Par exemple, si
											un joueur collecte 28 points et son coéquipier 2, l'équipe gagne.
										</p>
										<p class="text-justify">
											En ce qui concerne les effets des cartes, votre coéquipier n'est pas considéré comme un adversaire. Une
											carte qui fait référence à &quot;vous&quot; n'affecte que vous, tandis qu'une carte qui fait référence à
											&quot;un adversaire&quot; ou à &quot;tous les adversaires&quot; n'affecte que un ou les joueurs de l'autre
											équipe. Enfin, une carte qui fait référence à &quot;tous les joueurs&quot; affecte tout le monde, sans
											restriction.
										</p>
										<p class="text-justify">
											Vous ne pouvez jamais lancer un défi contre votre coéquipier, quelle qu'en soit la raison.
										</p>
										<p class="text-justify">
											La variante &laquo; Deux couronnes &raquo; n'utilise pas les titres multijoueurs.
										</p>
									<h3>Variante &laquo; Littlefinger &raquo;</h3>
										<p class="text-justify">
											Dans cette variante, les joueurs peuvent aussi utiliser leur or pour influencer (ou corrompre) les actions
											des autres joueurs. Pour cette raison, l'or peut être échangé ou offert aux autres joueurs durant
											n'importe quelle phase autre que celle de recrutement.
										</p>
										<p class="text-justify">
											La seule contrainte est que l'or doit être payé en avance de l'action souhaitée (ou empêchée). Les joueurs
											peuvent négocier à tout moment, mais cela ne doit pas être utilisé pour ralentir le jeu ou irriter
											volontairement les autres joueurs.
										</p>
										<p class="text-justify">
											Mais souvenez-vous, c'est un jeu de trônes (<em>Game of Thrones</em>), et les joueurs peuvent (et vont)
											vous mentir et ne pas forcément tenir leur parole, même si l'argent a déjà été échangé... Alors, soyez
											prudent !
										</p>
										<p class="text-justify">
											La négociation est un outil puissant, tant que vous n'oubliez pas que chaque marché que vous concluez ou
											déshonorez aura des conséquences que vous devrez assumer entièrement. Les autres joueurs pourraient même
											décider de vous faire payer votre félonie par une alliance destructrice à votre encontre !
										</p>
										<p class="text-justify">
											Les titres multijoueurs sont utilisés dans la variante &laquo; Littlefinger &raquo;.
										</p>
							</div>
							<div class="tab-pane" id="credits">
								<h2>Crédits</h2>
								<p class="text-justify">
									<dl class="dl-horizontal">
										<dt>Développeur</dt>
										<dd>Nate French</dd>
										<dt>Un jeu de</dt>
										<dd>Eric M. Lang et Christian T. Petersen</dd>
										<dt>Graphismes</dt>
										<dd>Andrew Navaro</dd>
										<dt>Direction artistique</dt>
										<dd>Zoë Robinson</dd>
										<dt>Relecture</dt>
										<dd>Harold Jean, Gregory Kulaga, et des membres de <a href="http://www.lagardedenuit.com/">La Garde de Nuit</a></dd>
										<dt>Remerciements</dt>
										<dd>
											&Agrave; George R.R. Martin<br/>
											&Agrave; <a href="http://letronedeferjce.forumactif.com/">la communauté du Trône de Fer JCE</a><br/>
											&Agrave; René Perin, Franck Balisson, Danakh, Mathaplo, Mildaene et Gisèle Bundchen
										</dd>
									</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- JavaScript -->
		<script src="../../webroot/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('#tabs').tab();
			});
		</script>
		<!-- Page Specific Plugins -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	</body>
</html>