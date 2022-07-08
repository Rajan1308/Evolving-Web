import React from 'react';

import card from './card.twig';

import cardData from './card.yml';
import cardBgData from './card-bg.yml';
import cardImage from './cards-image.yml';
import cardTeamMemberData from './card-team-member.yml';
import teamMemberSpotlightData from './team-member-spotlight.yml';
import cardWithImageLinkData from './card-with-image-link.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Cards' };

export const cardExample = () => (
  <div dangerouslySetInnerHTML={{ __html: card(cardData) }} />
);

export const cardWithBackground = () => (
  <div
    dangerouslySetInnerHTML={{ __html: card({ ...cardData, ...cardBgData }) }}
  />
);

export const cardWithImage = () => (
  <div dangerouslySetInnerHTML={{ __html: card(cardImage) }} />
);

export const cardTeamMember = () => (
  <div dangerouslySetInnerHTML={{ __html: card(cardTeamMemberData) }} />
);

export const teamMemberSpotlight = () => (
  <div dangerouslySetInnerHTML={{ __html: card(teamMemberSpotlightData) }} />
);

export const cardWithImageLink = () => (
  <div dangerouslySetInnerHTML={{ __html: card(cardWithImageLinkData) }} />
);
