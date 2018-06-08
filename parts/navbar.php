<nav class="navbar sj-navbar">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="sj-navbar">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav navbar-nav navbar-left',
                    'walker' => new wp_bootstrap_navwalker())
            ));
            ?>
        </div>
    </div>
</nav>

<nav class="navbar sj-navbar" [ngClass]="{'navbar-fixed-top': navFixedTop}">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" [routerLink]="['/']">
                <img src="/assets/images/ScholarJet_Logo_Primary_Navy_RGB.png" class="navbar-brand-img"/>
            </a>
            <button type="button" class="sj-navbar__toggle collapsed"
                    data-toggle="collapse" data-target="#sj-navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="hamburger"></span>
                <span class="nav-X"></span>
                Menu
            </button>
        </div>
        <div class="collapse navbar-collapse" id="sj-navbar">
            <ul class="nav navbar-nav navbar-left">
                <li *ngIf="!!student">
                    <a [routerLink]="profilePath"
                       class="nav-link">
                        My Dashboard
                    </a>
                </li>
                <li *ngIf="!!donor">
                    <a [routerLink]="['/donors', donor.id , 'challenges' ]"
                       class="nav-link">
                        My Challenges
                    </a>
                </li>
                <li>
                    <a [routerLink]="['/challenges/browse']" class="nav-link">
                        Current Challenges
                    </a>
                </li>
                <li>
                    <a [routerLink]="['/challenges/browse']" [queryParams]="{ status: ['COMPLETED', 'CLOSED'] }"
                       class="nav-link">
                        Past Challenges
                    </a>
                </li>
                <li>
                    <a [routerLink]="['/how-it-works']" class="nav-link">
                        How it Works
                    </a>
                </li>
                <li>
                    <a [routerLink]="['/about-us/team']" class="nav-link">
                        About Us
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="https://medium.com/scholarjet" target="_blank" rel="noopener noreferrer">
                        Blog
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-link-accent" *ngIf="!isUserLoggedIn() || !student">
                    <a [routerLink]="['/company']" class="nav-link">
                        For Companies
                    </a>
                </li>

                <li *ngIf="isUserLoggedIn()" class="dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        Hello, {{nameToDisplay}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li *ngIf="student; else profileLink">
                            <a [routerLink]="['/students/profile']">Profile</a>
                        </li>

                        <li>
                            <a [routerLink]="['/changeEmailPassword']">
                                Change Email/Password
                            </a>
                        </li>
                        <li *ngIf="organization">
                            <a [routerLink]="['/organizations', organization.id | hashids]">
                                {{organization.name}}
                            </a>
                        </li>
                        <ng-template
                            #profileLink>
                            <li *ngIf="profilePath"><a [routerLink]="profilePath">Profile</a></li>
                        </ng-template>
                        <li *ngIf="school"><a [routerLink]="['/schools/dashboard']">Dashboard</a></li>
                        <li><a class="nav-link" *ngIf="isUserLoggedIn()" (click)="logOut()">Sign Out</a></li>
                    </ul>
                </li>
                <li *ngIf="!disableLoginSignUp && !isUserLoggedIn()">
                    <a [routerLink]="['/login']"
                       class="nav-link">
                        Sign In
                    </a>
                </li>
                <li *ngIf="!disableLoginSignUp && !isUserLoggedIn()">
                    <a [routerLink]="['/signUp']"
                       class="nav-link">
                        Sign up
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>