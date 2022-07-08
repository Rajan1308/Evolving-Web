import React from 'react';

import post from './post.twig';

import postData from './post.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Post Block ' };

export const Post = () => (
  <div dangerouslySetInnerHTML={{ __html: post(postData) }} />
);
