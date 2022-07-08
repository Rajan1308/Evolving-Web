import React from 'react';

import headerTop from './header-top.twig';

import headerTopData from './header-top.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Header Top' };

export const HeaderStrip = () => (
  <div dangerouslySetInnerHTML={{ __html: headerTop(headerTopData) }} />
);
