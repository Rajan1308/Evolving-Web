import React from 'react';

import articleHeader from './article-header.twig';

import articleData from './article-header.yml';
import recipeData from './recipe-header.yml';
import authorData from '../../02-molecules/author/author.yml';
import breadcrumbsData from '../../02-molecules/breadcrumbs/breadcrumbs.yml';
import tagsData from '../../02-molecules/tags/tags.yml';
import aboutUsData from '../../02-molecules/about-us/about-us.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/Article Header' };

export const ArticleHeader = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: articleHeader({
          ...articleData,
          ...authorData,
          ...breadcrumbsData,
          ...tagsData,
          ...aboutUsData,
        }),
      }}
    />
  );
};

export const ArticleRecipeHeader = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: articleHeader({
          ...recipeData,
          ...authorData,
          ...breadcrumbsData,
          ...tagsData,
          ...aboutUsData,
        }),
      }}
    />
  );
};
