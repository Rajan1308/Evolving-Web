import React from 'react';

import social from './social-share.twig';

import socialData from './social-share.yml';

import './social-share';
/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Social Share' };

export const SocialShare = () => (
  <div dangerouslySetInnerHTML={{ __html: social(socialData) }} />
);
