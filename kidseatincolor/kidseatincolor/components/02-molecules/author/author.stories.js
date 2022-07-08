import React from 'react';

import author from './author.twig';

import authorData from './author.yml';
import './author';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Author' };

export const Author = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: author({
          ...authorData,
        }),
      }}
    />
  );
};
