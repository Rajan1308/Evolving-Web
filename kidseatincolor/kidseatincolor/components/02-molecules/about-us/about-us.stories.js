import React from 'react';

import author from './about-us.twig';

import aboutUsData from './about-us.yml';

import './about-us';
/**
 * Storybook Definition.
 */
export default { title: 'Molecules/About us' };

export const AboutUs = () => {
  return (
    <div
      dangerouslySetInnerHTML={{
        __html: author({
          ...aboutUsData,
        }),
      }}
    />
  );
};
