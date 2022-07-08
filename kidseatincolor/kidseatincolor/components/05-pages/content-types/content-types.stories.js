import React from 'react';
import { useEffect } from '@storybook/client-api';

import '../../02-molecules/menus/main-menu/main-menu';
import '../../02-molecules/about-us/about-us';

import articleTwig from './article.twig';

import blogTwig from './blog.twig';

import mainMenuData from '../../02-molecules/menus/main-menu/main-menu.yml';
import breadcrumbData from '../../02-molecules/menus/breadcrumbs/breadcrumbs.yml';
import socialMenuData from '../../02-molecules/menus/social/social-menu.yml';
import footerMenuData from '../../02-molecules/menus/inline/inline-menu.yml';

import articleData from '../../03-organisms/article-header/article-header.yml';
import recipeData from '../../03-organisms/article-header/recipe-header.yml';
import authorData from '../../02-molecules/author/author.yml';
import breadcrumbsData from '../../02-molecules/breadcrumbs/breadcrumbs.yml';
import tagsData from '../../02-molecules/tags/tags.yml';
import authorProfileData from '../../02-molecules/author-profile/author-profile.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Pages/Content Types' };

export const article = () => {
  useEffect(() => Attach.attachBehaviors(), []);
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: articleTwig({
          page_layout_modifier: 'contained',
          ...mainMenuData,
          ...breadcrumbData,
          ...socialMenuData,
          ...footerMenuData,
          card__link__text: 'Click here',
        }),
      }}
    />
  );
};

export const blog = () => {
  useEffect(() => Attach.attachBehaviors(), []);
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: blogTwig({
          page_layout_modifier: 'contained',
          ...mainMenuData,
          ...breadcrumbData,
          ...socialMenuData,
          ...footerMenuData,
          ...articleData,
          ...authorData,
          ...breadcrumbsData,
          ...tagsData,
          ...authorProfileData,
        }),
      }}
    />
  );
};

export const recipe = () => {
  useEffect(() => Attach.attachBehaviors(), []);
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: blogTwig({
          page_layout_modifier: 'contained',
          ...mainMenuData,
          ...breadcrumbData,
          ...socialMenuData,
          ...footerMenuData,
          ...recipeData,
          ...authorData,
          ...breadcrumbsData,
          ...tagsData,
          ...authorProfileData,
        }),
      }}
    />
  );
};
