// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import kredytGotowkowy from './routes/kredytGotowkowy';
import wniosek from './routes/wniosek';

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  home,
  kredytGotowkowy,
  wniosek,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
